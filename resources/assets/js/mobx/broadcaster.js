$(document).ready(function () {
    var axiosrequest = axios.create({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
        }
    });

    // Broadcasters
    $('#broadcasters').DataTable({
        responsive: true,
        aaSorting: []
    });

    // Add broadcaster
    $('#add-broadcaster').on('click', function (e) {
        e.preventDefault();
        axiosrequest.get('/country').then(function (response) {
            $.each(response.data, function (i, v) {
                $('#selCountry').append('<option value="'+v.id+'">'+v.name+'</option>');
                $('#selCountry').trigger('chosen:updated');
            })
        });

        axiosrequest.get('/tag').then(function (response) {
            $.each(response.data, function (i, v) {
                $('#selTags').append('<option value="'+v.id+'">'+v.name+'</option>');
                $('#selTags').trigger('chosen:updated');
            })
        });

        $('#frmBroadcaster').modal('show');

        $('#txtLogo').on('change', function (e) {
            e.preventDefault();
            const uploadImg     = document.getElementById('txtLogo');
            if ( uploadImg.files.length ){
                const btnSaveBroadcaster = $('#btnSaveBroadcaster');
                const txtLogo   = $('#txtLogo');
                const dvUploadLogo   = $('#dvUploadLogo');
                const f_storage_id  = Math.floor(Date.now()/1000);
                const imageStore    = firebase.storage().ref('/images/'+f_storage_id).put(uploadImg.files[0]);

                btnSaveBroadcaster.text('uploading...');

                dvUploadLogo.html('<div id="upload-progress" class="progress"><div class="progress-bar bg-black progress-lg active" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 100%"><span class="">Uploading...</span></div></div>');
                imageStore.on('state_changed', function (snapShot) {
                    // Observe state change events such as progress, pause, and resume
                    // Get task progress, including the number of bytes uploaded and the total number of bytes to be uploaded
                    var progress = Math.round((snapShot.bytesTransferred / snapShot.totalBytes) * 100);
                    var uploadProgress = $('#upload-progress');
                    $(document).ready(function () {
                        uploadProgress.animate({width: progress + '%'}, 'slow');
                        uploadProgress.find('span').html(progress + '% complete');
                    });

                    if (progress === 100) {
                        uploadProgress.find('div').addClass('progress-bar-success');
                        uploadProgress.find('div').removeClass('active');

                    }
                }, function (error) {
                    console.log(error);
                }, function () {
                    dvUploadLogo.attr('data-img-url', imageStore.snapshot.downloadURL);
                    dvUploadLogo.attr('data-storage-id', f_storage_id);
                    btnSaveBroadcaster.text('Save');
                });
            }
        });

        $('#frmSaveBroadcaster').validate({
            submitHandler: function(form){
                const $this_text        = $('#btnSaveBroadcaster');
                const dvUploadLogo      = $('#dvUploadLogo');
                const broadcaster       = {};

                broadcaster.name        = $('#txtBroadcasterName').val();
                broadcaster.city        = $('#txtCity').val();
                broadcaster.frequency   = $('#txtFrequency').val();
                broadcaster.address     = $('#txtAddress').val();
                broadcaster.country     = $('#selCountry').val();
                broadcaster.region      = $('#selRegion').val();
                broadcaster.phone       = $('#txtPhone').val();
                broadcaster.stream_id   = $('#txtStreamId').val();
                broadcaster.tagline     = $('#txtTagLine').val();
                broadcaster.tags        = $('#selTags').val();

                broadcaster.logo        = dvUploadLogo.attr('data-img-url');
                broadcaster.f_storage_id = dvUploadLogo.attr('data-storage-id');

                if (broadcaster.country === null || broadcaster.country.length === 0){
                    swal('Oh no!', 'Please select country!', 'error');
                } else if (broadcaster.region === null || broadcaster.region.length === 0){
                    swal('Oh no!', 'Please select region!', 'error');
                } else if (broadcaster.tags === null || broadcaster.tags.length === 0){
                    swal('Oh no!', 'Please select at least one tag!', 'error');
                } else {
                    if ($this_text.text() === 'Save') {
                        $this_text.text('Saving...');
                        axiosrequest.post('/broadcaster', broadcaster).then(function (response) {
                            $('#frmBroadcaster').modal('hide');
                            swal('yay!', response.data.message, 'success');
                        }).catch(function (error) {
                            console.log(error);
                        });
                    } else if ($this_text.text() === 'Update') {
                        swal('yay!!', 'Broadcaster Updated!', 'success');
                    }
                }
                return false;
            }
        });
    });

    $('#selCountry').on('change', function () {
       axiosrequest.get('/country/region/'+$(this).val()).then(function (response) {
           $.each(response.data, function (i, v) {
               $('#selRegion').append('<option value="'+v.id+'">'+v.name+'</option>');
               $('#selRegion').trigger('chosen:updated');
           });
       });
    });
    // Add broadcaster

    // Save Broadcaster


    // $('#btnSaveBroadcaster').on('click', function (e) {
    //
    // });
    // End Save Broadcaster

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
                showLoaderOnConfirm: true
            },
            function (isConfirm) {
                if (isConfirm){
                    deleteBroadcaster(id, $this, $this.attr('data-name'));
                    setTimeout(function () {
                        swal('Operation timed out!', 'Sorry, we were unable to handle your request', 'info');
                    }, 15000);
                }
            });
    });
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
    });
    // Listen
});