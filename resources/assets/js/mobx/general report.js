$(document).ready(function () {

    var contents = $('#general-reports').DataTable({
        columns: [
            {title: "title", className: 'text-center'},
            {title: "artists", className: 'text-center'},
            {title: "broadcaster", className: 'text-center'},
            {title: "played at", className: 'text-center'}
        ],
        aaSorting: []
    });

    const axiosrequest = axios.create({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
        }
    });

    $('#fetch-plays-by-date').on('click', function (e) {
        e.preventDefault();
        const $this = $(this);
        if ($this.text() !== 'fetching...'){
            $this.text('fetching...');
            contents.rows().remove().draw();

            axiosrequest.get('/play/'+$('#start-date').val()+'/'+$('#end-date').val()).then(function (response) {
                $.each(response.data, function (i, v) {
                    contents.row.add([
                        v.title, v.artists, v.broadcaster, v.played_at
                    ]).draw();
                });
                $this.text('fetch');

            }).catch(function (error) {
                console.log(error);
                $this.text('fetch');
            });
        }
    });
});

var getArtistNames = function (play) {
    var artists = [];
    $.each(play.file.artists, function (v,i) {
        artists.push(i.nick_name);
    });
    return artists;
};