$(document).ready(function () {
    $('.datatables').DataTable({
        aaSorting: [],
        responsive: true
    });

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
                params.type = 'error';
            }
            swal(params);
        }).catch(function (error) {
            console.log(error.response);
        });
    });
    // Delete file

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

    $('.chosen-select').chosen({
        disable_search_threshold: 10,
        no_results_text: "Oops, nothing found!",
        width: "100%"
    });

    // Validate text boxes
    $('.isValid').on('focusout', function () {
        var $this = $(this);
        if($this.val().length > 0 && $this.val().length < 2){
            $this.parent('div').addClass('has-error');
            $this.parent('div').removeClass('has-success');
            $this.parent('div').find('span').remove();
            $this.parent('div').append('<span class="glyphicon glyphicon-warning-sign form-control-feedback"></span>');
        } else if ($this.val().length === 0) {
            $this.parent('div').removeClass('has-error');
            $this.parent('div').find('span').remove();
            // $this.parent('div').append('<span class="glyphicon glyphicon-remove-sign form-control-feedback"></span>');
        } else {
            $this.parent('div').removeClass('has-error');
            $this.parent('div').addClass('has-success');
            $this.parent('div').find('span').remove();
            $this.parent('div').append('<span class="glyphicon glyphicon-ok form-control-feedback"></span>');
        }
    });

    $('#upload-file').on('click', function (e) {
        e.preventDefault();
        var valid = true;
        var $this = $(this).closest('div.row').siblings('div').find('div.has-feedback');
        var that = $(this).closest('div.row').siblings('div');
        var upload_type = document.location.href.split('/')[5];
        $.each($this, function (index, input) {
            if ($(this).hasClass('has-error') || $(this).find('input').val().length === 0){
                valid = false;
            }
        });

        if (valid){
            var audio       = document.getElementById('audio');
            var image       = document.getElementById('img');
            var storage     = firebase.storage();
            var uploadForm  = $('#upload-form');
            var f_storage_id    =   Math.floor(Date.now()/1000);
            var ad          = {};
            var song        = {};
            var ad_name, ad_title, song_title, song_artists, song_album, song_label, song_producer, song_genre, song_release;

            if (upload_type === 'ad'){
                ad_name     = $('#ad-name').val();
                ad_title    = $('#ad-title').val();
            } else if (upload_type === 'song') {
                song_title      =   $('#song-title').val();
                song_artists    =   $('#artists').val();
                song_album      =   $('#album').val();
                song_producer   =   $('#producer').val();
                song_genre      =   $('#genre').val();
                song_label      =   $('#label').val();
                song_release    =   $('#txtReleaseDate').val();
            }

            var images      = ['image/jpg', 'image/jpeg', 'image/png'];
            var audios      = ['audio/mp3', 'audio/mpeg', 'audio/mpeg3', 'audio/x-mpeg-3'];
            var imageStore  = null;

            if (image.files.length){
                // upload flier if there's a file selected
                if (images.indexOf(image.files[0].type) === -1) {
                    return swal('violation', 'Only jpg or png file formats are allowed', 'error');
                } else if (image.files[0].size < 2000001){
                    imageStore = storage.ref('/images/'+f_storage_id);
                } else {
                    return swal('violation', 'Image must be 2MB or less', 'error');
                }
            }

            if (audio.files.length){
                // upload flier if there's a file selected
                if (audios.indexOf(audio.files[0].type) === -1) {
                    return swal('violation', 'Only audio files in with mp3 encoding are allowed', 'error');
                } else if (audio.files[0].size < 15000001){
                    var audioStore   = storage.ref('/audios/'+f_storage_id);
                    var upload_audio = audioStore.put(audio.files[0]);

                    uploadForm.html('<label>uploading audio...</label><br><div id="upload-progress" class="progress"><div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 100%"><span class="">45% Complete</span></div></div>');

                    upload_audio.on('state_changed', function (snapShot) {
                        // Observe state change events such as progress, pause, and resume
                        // Get task progress, including the number of bytes uploaded and the total number of bytes to be uploaded
                        var progress = Math.round((snapShot.bytesTransferred / snapShot.totalBytes) * 100);
                        var uploadProgress= $('#upload-progress');
                        $(document).ready(function () {
                            uploadProgress.animate({width: progress + '%'}, 'slow');
                            uploadProgress.find('span').html(progress+'% complete');
                        });

                        if (progress === 100){
                            uploadProgress.find('div').addClass('progress-bar-success');
                            uploadProgress.find('div').removeClass('active');

                        }
                    }, function (error) {
                        console.log(error);
                    }, function () {
                        var audioURL = upload_audio.snapshot.downloadURL;
                        if (image.files.length){
                            var upload_image = imageStore.put(image.files[0]);
                            uploadForm.html('<label>uploading flier...</label><br><div id="upload-progress" class="progress"><div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 100%"><span class="">45% Complete</span></div></div>');
                            upload_image.on('state_changed', function (snapShot) {
                                // Observe state change events such as progress, pause, and resume
                                // Get task progress, including the number of bytes uploaded and the total number of bytes to be uploaded
                                var progress = Math.round((snapShot.bytesTransferred / snapShot.totalBytes) * 100);
                                var uploadProgress= $('#upload-progress');
                                $(document).ready(function () {
                                    uploadProgress.animate({width: progress + '%'}, 'slow');
                                    uploadProgress.find('span').html(progress+'% complete');
                                });

                                if (progress === 100){
                                    uploadProgress.find('div').addClass('progress-bar-success');
                                    uploadProgress.find('div').removeClass('active');

                                }
                            }, function (error) {
                                console.log(error);
                            }, function () {
                                var imageURL = upload_image.snapshot.downloadURL;
                                if ( upload_type === 'ad'){
                                    ad.title    =   ad_title;
                                    ad.name     =   ad_name;
                                    ad.img      =   imageURL;
                                    ad.audio    =   audioURL;
                                    ad.f_storage_id = f_storage_id;
                                } else if (upload_type === 'song') {
                                    song.title      =   song_title;
                                    song.artists    =   song_artists;
                                    song.album      =   song_album;
                                    song.f_storage_id   =   f_storage_id;
                                    song.label      =   song_label;
                                    song.producer   =   song_producer;
                                    song.img        =   imageURL;
                                    song.audio      =   audioURL;
                                    song.genre      =   song_genre;
                                    song.release    =   song_release;
                                }

                                axiosrequest.post('', ($.isEmptyObject(ad))? song : ad).then(function (response) {
                                    uploadForm.empty();
                                    $('#upload-opt').fadeIn();
                                    swal('yay!', 'upload completed with no errors!', 'success');
                                }).catch(function (error) { console.log(error); });
                            });
                        } else {
                            if ( upload_type === 'ad'){
                                ad.title    =   ad_title;
                                ad.name     =   ad_name;
                                ad.audio    =   audioURL;
                                ad.f_storage_id = f_storage_id;
                            } else if (upload_type === 'song') {
                                song.title      =   song_title;
                                song.artists    =   song_artists;
                                song.album      =   song_album;
                                song.f_storage_id   = f_storage_id;
                                song.label      =   song_label;
                                song.producer   =   song_producer;
                                song.audio      =   audioURL;
                                song.genre      =   song_genre;
                                song.release    =   song_release;
                            }
                            axiosrequest.post('', ($.isEmptyObject(ad))? song : ad).then(function (response) {
                                uploadForm.empty();
                                $('#upload-opt').fadeIn();
                                swal('yay!', 'upload completed with no errors!', 'success');
                            }).catch(function (error) { console.log(error); });
                        }

                    });
                } else {
                    return swal('violation', 'Audio must be 15MB or less', 'error');
                }
            } else {
                return swal('violation', 'Please select an audio file in mp3 format', 'error');
            }

        } else {
            swal('validation error', 'Please fill all fields marked (*)', 'error');
        }
    });

    // Upload Ads

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
    };

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
    };

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
    };

    var googleMusicUploader = function (audio, allowedAudios, audioSizeLimit, image, allowedImages, imageSizeLimit, fileName, remotePath, progress, progressLabel, data) {

        if (audio.files.length) {
            if (allowedAudios.indexOf(audio.files[0].type) === -1) {
                return swal('violation', 'Only mp3 file formats are allowed', 'error');

            } else if (audio.files[0].size < audioSizeLimit) {

                var storage = firebase.storage();
                fileStorage = storage.ref('/audios/' + fileName);

                var uploading = fileStorage.put(audio.files[0]);

                progress.html('<label>'+progressLabel+'</label><br><div id="upload-progress" class="progress"><div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 100%"><span class="">45% Complete</span></div></div>');

                uploading.on('state_changed', function (snapShot) {
                    // Observe state change events such as progress, pause, and resume
                    // Get task progress, including the number of bytes uploaded and the total number of bytes to be uploaded
                    var progressBar = Math.round((snapShot.bytesTransferred / snapShot.totalBytes) * 100);

                    $(document).ready(function () {
                        progress.animate({width: progressBar + '%'}, 'slow');
                        progress.find('span').html(progressBar + '% complete');
                    });

                    if (progressBar === 100) {
                        progress.find('div').addClass('progress-bar-success');
                        progress.find('div').removeClass('active');

                    }
                }, function (error) {
                    return console.log(error);
                }, function () {
                    data.audio = uploading.snapshot.downloadURL;
                    if (image.files.length){
                        fileStorage = storage.ref('/images/' + fileName);
                        uploading = fileStorage.put(image.files[0]);
                        progress.html('<label>uploading image...</label><br><div id="upload-progress" class="progress"><div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 100%"><span class="">45% Complete</span></div></div>');
                        uploading.on('state_changed', function (snapShot) {
                            // Observe state change events such as progress, pause, and resume
                            // Get task progress, including the number of bytes uploaded and the total number of bytes to be uploaded
                            var progressBar = Math.round((snapShot.bytesTransferred / snapShot.totalBytes) * 100);

                            $(document).ready(function () {
                                progress.animate({width: progressBar + '%'}, 'slow');
                                progress.find('span').html(progressBar + '% complete');
                            });

                            if (progressBar === 100) {
                                progress.find('div').addClass('progress-bar-success');
                                progress.find('div').removeClass('active');

                            }
                        }, function (error) {
                            return console.log(error);
                        }, function () {
                            data.img = uploading.snapshot.downloadURL;
                            axiosrequest.post('', data).then(function (response) {
                                $('#frmSongUpload').empty();
                                $('#upload-opt').fadeIn();
                                swal('yay!', 'upload completed with no errors!', 'success');
                            }).catch(function (error) { console.log(error); });

                        });

                    } else {
                        axiosrequest.post('', data).then(function (response) {
                            $('#frmSongUpload').empty();
                            $('#upload-opt').fadeIn();
                            swal('yay!', 'upload completed with no errors!', 'success');
                        }).catch(function (error) { console.log(error); });
                    }
                });
            }
        } else {
            swal('violation', 'No file found in the file container specified!', 'error');
        }
    };

    var getTheDate = function () {
        var isRange = moment($('#end-date').val()).diff($('#start-date').val(), 'days');
        return (isRange)? $('#start-date').val() + '_' + $('#end-date').val() : $('#start-date').val();
    };
    // Reports

    function requestDashboardData() {
        // return axiosrequest.get('/play/today').then(getTodayPlays).catch(function (error) {
        //     console.log(error);
        //     // console.log('Qisimah is fetching data, refresh if you don\'t see any updates for a while!');
        // });
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
        });

    }
    // Functions
});