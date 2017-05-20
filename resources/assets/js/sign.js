/**
 * Created by MEST on 4/3/2017.
 */
$(document).ready(function () {
    var paths = window.location.href.split('/');
    var axiosrequest = axios.create({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
        }
    });

    // Delete file
    $('.delete-record').on('click', function (e) {
        e.preventDefault();
        var that = $(this);
        var id = $(this).attr('data-record-id');
        var _token = $('meta[name="token"]').attr('content');
        var params = {
            title: 'Delete Audio'
        };

        axiosrequest.delete('/file/'+id, {_token:_token}).then(function (response) {
            params.text = response.data.message;
            if (response.data.deleted === true){
                params.type = 'success';
                that.closest('tr').remove();
            } else {
                params.type = 'error'
            }
            swal(params);
        }).catch(function (error) {
            console.log(error.response);
        });
    });
    // Delete file

    // Broadcasters
    $('#broadcasters').DataTable({
        aaSorting: []
    });
    // $('#daily-plays').DataTable();

    // Add broadcaster
    $('#add').on('click', function (e) {
        e.preventDefault();
        swal({
            title: 'Add Broadcaster',
            html: true
        });
    })
    // Add broadcaster

    // Delete Broadcaster
    $('.delete-broadcaster').on('click', function (e) {
        e.preventDefault();
        var id = $(this).attr('data-content');
        var $this = $(this);
        swal({
                title: "Delete Broadcaster",
                text: "This will permanently remove "+ $(this).attr('data-name'),
                type: "warning",
                showCancelButton: true,
                closeOnConfirm: false,
                showLoaderOnConfirm: true,
            },
            function (isConfirm) {
                if (isConfirm){
                    deleteBroadcaster(id, $this, $this.attr('data-name'));
                    setTimeout(function () {
                        swal('Operation timed out!', 'Sorry, we were unable to handle your request', 'info')
                    }, 15000);
                }
            });
    })
    // Delete Broadcaster
    // Broadcasters

    // Listen
    $('.listen').on('click', function (e) {
        e.preventDefault();
        var bid = $(this).attr('data-content');

        var span = $(this).closest('td').siblings('td').find('span');
        // var listening_id = $(this).closest('tr').attr('data-content');
        if (span.text() === 'not listening'){
            span.text('tuning in...').removeClass('label-danger').addClass('label-warning');
            axiosrequest.post('/listen', {'broadcaster_id': bid}).then(function (response) {
                if (!response.data.listen){
                    swal('Error', 'Seems you\'re already tuned in to this station!', 'info');
                }
                span.text('listening').removeClass('label-warning').addClass('label-success');
            });
        } else if(span.text() === 'listening') {
            span.text('tuning out...').removeClass('label-danger').addClass('label-warning');
            axiosrequest.post('/listen/delete', {broadcaster_id:bid}).then( function (response) {
               if (!response.data.deleted){
                   swal('Error', 'Seems you\'re already not tuned in to this station!', 'info');
               }
                span.text('not listening').removeClass('label-warning').addClass('label-danger');
            });
        }
    })
    // Listen

    // Dashboard Cards
    if (paths[3] === ""){
        requestDashboardData();
        setInterval(requestDashboardData, 60000);
    }
    // Dashboard Cards

    // User Registration
    $('#sign-up').on('click', function (e) {
        e.preventDefault();
        $('label.validation').text('');
        if ($('input[name="t-c"]').is(':checked')){
            if ($('input[name="user"]').is(':checked')){
                if ($('#password').val() === $('#password_confirm').val()){
                    $('#sign-up').text('processing...');
                    var register = {};
                    register.first_name                 = $('#first_name').val();
                    register.last_name                  = $('#last_name').val();
                    register.password                   = $('#password').val();
                    register.password_confirmation      = $('#password_confirm').val();
                    register.email                      = $('#email').val();
                    register.type                       = ($('#advertiser').val())? $('#advertiser').val() : $('#radio-station').val();
                    register.t_c                        = $('#t_c').val();
                    axiosrequest.post('register', register).then(function (response) {
                        $('#sign-up').text('signing in...');
                        window.location.href = '/';
                    }).catch(function (error) {
                        if (error.response){
                            var errormessage = error.response;
                            if (errormessage.status === 422){
                                var messages = errormessage.data;
                                for (var prop in messages){
                                    validationMsg(prop, messages[prop]);
                                }
                            } else {
                                alert('Something went wrong, we couldn\'t process your request. Please try again later!');
                            }
                            $('#sign-up').text('sign up');
                        }
                    });
                } else {
                    alert('Password mismatch!');
                }
            } else {
                alert('Please select account type!');
            }
        } else {
            alert('You\'ll have to agree to our terms and conditions');
        }
    });
    // User Registration


    // Functions
    function validationMsg(id, msg) {
        $('#'+id).closest('div').siblings('label.validation').text(msg);
    }

    function counting(id, initial, final) {
        final = (final)? final : 0;
        return new CountUp(document.getElementById(id), initial, final, 0, 3).start();
    }

    // Trim function
    function trimString(string, start, stop, trail) {
        return (string.length > 12)? string.substring(start, stop) + trail : string;
    }

    // Get Artist
    function getArtist(artists) {
        var artist = (typeof artists !== 'undefined')? artists : '';
        return (artist.length)? artist.name : 'Artist';
    }

    // Get real time data for dashboard
    function getTodayPlays(response) {
        console.log('test the success function');
        var most_played     = response.data[1];
        var all_time_played = response.data[2];
        var broadcaster     = response.data[3];

        console.log(all_time_played);

        var all_time_artist = null;
        var all_time_title  = null;

        if (all_time_played.length == 0){
            all_time_artist     = '';
            all_time_title      = 'no plays yet!';
        } else {
            all_time_artist     = (all_time_played.artists.length)? all_time_played.artists[0].name : 'Artist';
            all_time_title      = trimString(all_time_played.detections.title, 0, 9, '...');
        }

        counting('today-plays', parseInt($('#today-plays').text()), parseInt(response.data[0]));
        counting('most-played', parseInt($('#most-played').text()), parseInt(most_played.plays));
        counting('all-time-play', parseInt($('#all-time-play').text()), all_time_played.count);
        counting('broadcaster-plays', parseInt($('#broadcaster-plays').text()), broadcaster.plays);

        $('#most-played-artist').html((most_played.artists.length)? trimString(most_played.artists[0].name, 0, 12, '...') : 'Artist');
        $('#most-played-title').text(trimString(most_played.title, 0, 12, '...'));

        $('#all-time-artist').html(all_time_artist);
        $('#all-time-title').text(trimString(all_time_title));

        $('#broadcaster-name').text(broadcaster.broadcaster.name);
        $('#broadcaster-country').html(broadcaster.broadcaster.country);

        $('#daily-plays').DataTable({
            data : response.data[4],
            columnDefs: [{
                targets: 0,
                render: function (data, type, row) {
                    return data.length > 30? data.substr(0, 27) + '...' : data;
                }
            }],
            columns: [
                {"data" : "title"},
                {"data" : "artist"},
                {"data" : "broadcaster"},
                {"data" : "played"}
            ],
            destroy: true,
            aaSorting: []
        });
    }

    // Reports
    $('#fetch-plays-by-date').on('click', function (e) {
        e.preventDefault();
        $(this).text('fetching...');
        axiosrequest.get('/play/'+getTheDate()).then(handlePlayData);
    });

    $('#fetch-broadcaster-by-date').on('click', function (e) {
        e.preventDefault();
        $(this).text('fetching...');
        axiosrequest.get('/play/broadcaster/'+$('#b-filter').val()+'/'+getTheDate()).then(handleBroadcasterData);
    });

    $('#fetch-content-by-date').on('click', function (e) {
        e.preventDefault();
        $(this).text('fetching...');
        axiosrequest.get('/play/content/'+$('#c-filter').val()+'/'+getTheDate()).then(handleContentData);
    });

    var handlePlayData = function (response) {
        $('.fetchable').text('fetch');
        $('#general-reports').DataTable({
            data : response.data,
            columnDefs: [
                {
                    targets: 0,
                    render: function (data, type, row) {
                        return data.length > 30 ? data.substr(0, 27) + '...' : data;
                    }
                },
                {
                    targets: 1,
                    render: function (data, type, row) {
                        return data.length > 30 ? data.substr(0, 27) + '...' : data;
                    }
                }
            ],
            columns: [
                {"data" : "title"},
                {"data" : "artist"},
                {"data" : "broadcaster"},
                {"data" : "played"}
            ],
            destroy: true,
            aaSorting: []
        });
    }

    var handleBroadcasterData = function (response) {
        $('.fetchable').text('fetch');
        $('#broadcaster-report').DataTable({
            data : response.data,
            columnDefs: [
                {
                    targets: 0,
                    render: function (data, type, row) {
                        return data.length > 30 ? data.substr(0, 27) + '...' : data;
                    }
                },
                {
                    targets: 1,
                    render: function (data, type, row) {
                        return data.length > 30 ? data.substr(0, 27) + '...' : data;
                    }
                },
                {
                    targets: 2,
                    render: function (data, type, row) {
                        return data.length > 30 ? data.substr(0, 27) + '...' : data;
                    }
                }
            ],
            columns: [
                {"data" : "title"},
                {"data" : "artist"},
                {"data" : "album"},
                {"data" : "played"}
            ],
            destroy: true,
            aaSorting: []
        });
    }

    var handleContentData = function (response) {
        $('.fetchable').text('fetch');
        $('#content-report').DataTable({
            data : response.data,
            columns: [
                {"data" : "name"},
                {"data" : "location"},
                {"data" : "reach"},
                {"data" : "played"}
            ],
            destroy: true,
            aaSorting: []
        });
    }

    var getTheDate = function () {
        var isRange = moment($('#end-date').val()).diff($('#start-date').val(), 'days');
        return (isRange)? $('#start-date').val() + '_' + $('#end-date').val() : $('#start-date').val();
    }
    // Reports

    function requestDashboardData() {
        return axiosrequest.get('/play/today').then(getTodayPlays).catch(function (error) {
            console.log(error);
            // console.log('Qisimah is fetching data, refresh if you don\'t see any updates for a while!');
        });
    }

    function deleteBroadcaster(id, target, name) {
        axiosrequest.delete('broadcaster/'+id).then(function (response) {
            if (response.data.delete){
                swal('Delete Broadcaster', 'You have successfully deleted '+name, 'success');
                target.closest('tr').remove();
            }
            console.log(response);
        }).catch(function (error) {
            swal('Delete Broadcaster', 'Oops! '+name+' could not be deleted. Please try again later', 'error')
        })

    }
    // Functions
});