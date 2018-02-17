$(document).ready(function () {
    const axiosrequest = axios.create({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
        }
    });

    var report = $('#broadcaster-report').DataTable({
        columnDefs:[
            {
                targets: 1,
                render: function (data) {
                    var names = [];
                    $.each(data, function (i, v) {
                        names.push(v);
                    });
                    return names;
                }
            }
        ],
        columns:[
            {title: 'title', className: 'text-center'},
            {title: 'artist', className: 'text-center'},
            {title: 'album', className: 'text-center'},
            {title: 'Date', className: 'text-center'}
        ]
    });

    $('#fetch-broadcaster-by-date').on('click', function (e) {
        e.preventDefault();
        const $this = $(this);

        const stream_id = $('#b-filter').val();
        if (stream_id === null){
            swal('input violation', 'Please select broadcaster!', 'info');
        } else {
            if ($this.text() !== 'fetching...'){
                $this.text('fetching...');
                report.rows().remove().draw();

                axiosrequest.get('/play/broadcaster/'+stream_id+'/'+$('#start-date').val()+'/'+$('#end-date').val()).then(function (response) {
                    $this.text('fetch');
                    $.each(response.data, function (i, v) {
                        report.row.add([v.title, v.artist, v.album, v.played_at]).draw();
                    });

                }).catch(function (error) {
                    $this.text('fetch');
                    console.log(error);
                });
            }
        }
    });
});