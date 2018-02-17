/**
 * Created by braas on 6/5/2017.
 */
$(document).ready(function () {
    const this_path = window.location.pathname;
    const axiosrequest = axios.create({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
        }
    });

    if (this_path === '/' || this_path === '/#') {
        const live_detection = $('#live-detection').DataTable({
            responsive: true,
            columnDefs: [
                {
                    targets: 0,
                    orderable: false,
                    className: 'text-left',
                    render: function (data) {
                        return '<div class="media">\n' +
                            '    <div class="media-left avatar">\n' +
                            '        <img src="' + data.img + '" class="media-object img-circle">\n' +
                            '        <span class="status bg-success"></span>\n' +
                            '    </div>\n' +
                            '    <div class="media-body">\n' +
                            '        <h5 class="media-heading">' + data.title + '</h5>\n' +
                            '        <p class="text-muted mb-0">' + data.artists + '</p>\n' +
                            '    </div>\n' +
                            '</div>';
                    }
                },
                {
                    targets: 1,
                    orderable: false,
                    className: 'text-left'
                },
                {
                    targets: 2,
                    orderable: false,
                    className: 'text-center'
                },
                {
                    targets: 3,
                    orderable: false,
                    className: 'text-right'
                },
                {
                    targets: 4,
                    orderable: false,
                    className: 'text-right'
                }
            ],
            columns: [
                {"data": "song"},
                {"data": "broadcaster"},
                {"data": "created_at"},
                {"data": "plays_today"},
                {"data": "plays_this_week"}
            ],
            destroy: true,
            aaSorting: [[2, 'desc']]
        });

        axiosrequest.get('/play/count/today').then(function (response) {
            const todays_plays = $('#today-plays');
            const most_played = $('#most-played');
            const all_time_play = $('#all-time-play');
            const broadcaster_plays = $('#broadcaster-plays');

            todays_plays.text(counting('today-plays', todays_plays.text(), response.data[0][0]));
            most_played.text(counting('most-played', most_played.text(), response.data[1][0]));
            all_time_play.text(counting('all-time-play', parseInt(all_time_play.text()), parseInt(response.data[2][0])));
            broadcaster_plays.text(counting('broadcaster-plays', broadcaster_plays.text(), response.data[3][0]));

            $.each(response.data[1][1], function (i, v) {
                $('#most-played-title').text(trimString(v.title, 0, 15, '...'));
                $('#most-played-artist').text(trimString(v.artist.nick_name, 0, 15, '...'));
            });

            $.each(response.data[2][1], function (i, v) {
                $('#all-time-title').text(trimString(v.title, 0, 15, '...'));
                $('#all-time-artist').text(trimString(v.artist.nick_name, 0, 15, '...'));
            });

            $('#broadcaster-name').text(trimString(response.data[3][1].name + ' ' + response.data[3][1].frequency, 0, 20, '...'));
            $('#broadcaster-country').text(trimString(response.data[3][1].city, 0, 20, '...'));

            live_detection.rows.add(response.data[0][1]).draw();
            getUpdates(live_detection, response.data[5], response.data[6], todays_plays);
        });
    }

    function getUpdates(table, user, id, todays_plays) {
        // Pusher.logToConsole = true;
        var pusher_options = {
            cluster: 'eu',
            encrypted: true,
            auth: {
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
                }
            }
        };

        var pusher = new Pusher('c4f320656ba2899c60c3', pusher_options);

        if (user === "eb0a191797624dd3a48fa681d3061212" || user === "34b81f08e80d23ea2454472421070786") {
            var channel = pusher.subscribe('private-listening-channel');
            channel.bind('play-event', function (data) {
                console.log(data);
                todays_plays.text(parseInt(todays_plays.text().replace(',', '')) + 1);
                table.row.add(data).draw();
            });
        } else {
            var channel = pusher.subscribe('private-' + id + '-channel');
            channel.bind('play-event', function (data) {
                todays_plays.text(parseInt(todays_plays.text().replace(',', '')) + 1);
                table.row.add(data).draw();
            });
        }
    }

});

// Trim function
function trimString(string, start, stop, trail) {
    return (string.length > 12) ? string.substring(start, stop) + trail : string;
}

function counting(id, initial, final) {
    final = (final) ? final : 0;
    return new CountUp(document.getElementById(id), parseInt(initial), parseInt(final), 0, 3).start();
}

