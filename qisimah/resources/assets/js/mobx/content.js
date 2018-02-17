$(document).ready(function () {
    const axiosrequest = axios.create({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
        }
    });

    const storage = firebase.storage();
    const initHtml = $('#dvUploadImg').html();

    $('#btnUploadSong').on('click', function (e) {
        e.preventDefault();

        var audio        =   document.getElementById('txtAudioFile');
        var image        =   document.getElementById('txtPromoArt');
        var uploadForm   =   $('#frmSongUpload');
        var audiosAllowed = ['audio/mp3', 'audio/mpeg', 'audio/mpeg3', 'audio/x-mpeg-3'];
        var imagesAllowed = ['image/jpg', 'image/jpeg', 'image/png'];
        var sizeLimit   =    12000001;
        var imageSizeLimit   =    2000000;

        if ($('#txtSongTitle').val() === '') {
            $('#txtSongTitle').focus();
            return swal('violation', 'Please enter title of song!', 'error');
        } else if ($('#selSongArtist').val() === null || $('#selSongArtist').val().length === 0) {
            $('#selSongArtist').focus();
            return swal('violation', 'Please select artist!', 'error');
        } else if ($('#selArtists').val().indexOf($('#txtSongTitle').val()) !== -1) {
            $('#selArtists').focus();
            return swal('violation', 'Artist cannot be a featured artist!', 'error');
        }

        if (image.files.length){
            if (imagesAllowed.indexOf(image.files[0].type) === -1) {
                return swal('violation', 'Only jpg or png file formats are allowed', 'error');

            } else if (image.files[0].size > imageSizeLimit) {

                return swal('violation', 'Image is too large, maximum allowed size: 2MB', 'error');
            }
        }

        var song         =   {};
        song.title       =   $('#txtSongTitle').val();
        song.artist      =   $('#selSongArtist').val();
        song.artists     =   $('#selArtists').val();
        song.label       =   $('#txtRecordLabel').val();
        song.album       =   $('#txtAlbum').val();
        song.genres      =   $('#selGenre').val();
        song.producers   =   $('#selProducers').val();
        song.releaseDate =   $('#txtReleaseDate').val();
        song.f_storage_id=   Math.floor(Date.now()/1000);

        googleMusicUploader(audio, audiosAllowed, sizeLimit, image, imagesAllowed, imageSizeLimit, song.f_storage_id, '/audios/', $('#frmSongUpload'), 'uploading song...', song);
    });

    $('.delete-content').on('click', function (e) {
        e.preventDefault();
        const table = $('#files').DataTable();
        const $this = $(this);
        const title = $this.closest('tr').find('td.title').text();
        const id = $this.attr('data-record-id');
        const storage_id = $this.attr('data-storage-id');

        swal({
                title: "Are you sure?",
                text: "Continuing with this action will permanently delete " + title,
                type: "warning",
                showCancelButton: true,
                closeOnConfirm: false,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                showLoaderOnConfirm: true
            },
            function () {
                setTimeout(function () {
                    axiosrequest.delete('/file/' + id, {params: {}}).then(function (response) {
                        if (response.data.code === 100 || response.data.code === 200) {
                            table.row($this.closest('tr')).remove().draw();
                            storage.ref('/audios/' + storage_id).delete().then(function () {
                                storage.ref('/images/' + storage_id).delete().then(function () {
                                    swal('yaY! you made it!', title + ' has been deleted successfully!', 'success');
                                }).catch(function (error) {
                                    swal('yaY! you made it!', title + ' has been deleted successfully!', 'success');
                                });
                            }).catch(function (error) {
                                swal('Oops!', title + ' was deleted but some remnants were left!', 'info');
                            });
                        }

                    }).catch(function (error) {
                        console.log(error);
                    });
                }, 100);
            });
    });

    $('.update-content').on('click', function (e) {
        e.preventDefault();
        toastr.success('Qisimah is getting the record ready for editing!', 'Please wait...');
        axiosrequest.get('/file/' + $(this).attr('data-record-id') + '/edit').then(function (response) {
            $('#fileEditorTitle').text("you're editing " + response.data.title);
            $('#btnUpdateFile').attr('data-record-id', response.data.id);
            $('#txtSongTitle').val(response.data.title);
            $('#txtReleaseDate').val(response.data.release_date);

            var file_artists = [];
            var file_producer = [];
            var file_genre = [];

            var count_artists = 0, count_genres = 0, count_producers = 0, file_artist = response.data.artist_id;

            $.each(response.data.artists, function (i, v) {
                file_artists.push(v.id);
            });

            $.each(response.data.producers, function (i, v) {
                file_producer.push(v.q_id);
            });

            $.each(response.data.genres, function (i, v) {
                file_genre.push(v.id);
            });

            axiosrequest.get('/artist/all').then(function (response) {
                const song_artists = $('#selArtists');
                const song_artist = $('#selArtist');
                song_artists.empty();
                song_artist.empty();

                $.each(response.data, function (i, v) {
                    var this_artist = (file_artists.indexOf(v.id) !== -1) ? "selected" : "";
                    song_artists.append("<option value='" + v.id + "' " + this_artist + ">" + v.nick_name + "</option>");
                    song_artists.trigger("chosen:updated");
                });

                $.each(response.data, function (i, v) {
                    var this_artist = (file_artist == v.id) ? "selected" : "";
                    song_artist.append("<option value='" + v.id + "' " + this_artist + ">" + v.nick_name + "</option>");
                    song_artist.trigger("chosen:updated");
                });
            });

            axiosrequest.get('/genre/all').then(function (response) {
                const song_genre = $('#selGenre');
                song_genre.empty();
                $.each(response.data, function (i, v) {
                    var this_genre = (file_genre.indexOf(v.id) !== -1) ? "selected" : "";
                    song_genre.append("<option value='" + v.id + "' " + this_genre + ">" + v.name + "</option>");
                    song_genre.trigger("chosen:updated");
                });
            });

            axiosrequest.get('/producer/all').then(function (response) {
                const song_producer = $('#selProducers');
                song_producer.empty();
                $.each(response.data, function (i, v) {
                    var this_producer = (file_producer.indexOf(v.q_id) !== -1) ? "selected" : "";
                    song_producer.append("<option value='" + v.q_id + "' " + this_producer + ">" + v.nick_name + "</option>");
                    song_producer.trigger("chosen:updated");
                });
                $('.bs-example-modal-form').modal('show');
            });

        }).catch(function (error) {
            console.log(error);
        });
    });

    $('#txtPromoArt').on('change', function (e) {
        e.preventDefault();
        const uploadImg     = document.getElementById('txtPromoArt');
        if ( uploadImg.files.length ){
            const btnUpdateFile = $('#btnUpdateFile');
            const txtPromoArt   = $('#txtPromoArt');
            const dvUploadImg   = $('#dvUploadImg');
            const f_storage_id  = Math.floor(Date.now()/1000);
            const imageStore    = firebase.storage().ref('/images/'+f_storage_id).put(uploadImg.files[0]);

            btnUpdateFile.text('uploading...');

            dvUploadImg.html('<div id="upload-progress" class="progress"><div class="progress-bar bg-black progress-lg active" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 100%"><span class="">Uploading...</span></div></div>');
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
                dvUploadImg.attr('data-img-url', imageStore.snapshot.downloadURL);
                dvUploadImg.attr('data-storage-id', f_storage_id);
                btnUpdateFile.text('Update');
            });
        }
    });

    $('#btnUpdateFile').on('click', function (e) {
    e.preventDefault();
    const $this = $(this);
    const dvUploadImg   = $('#dvUploadImg');
    const file  = {};
    file.title          = $('#txtSongTitle').val();
    file.releaseDate    = $('#txtReleaseDate').val();
    file.artist         = $('#selArtist').val();
    file.artists        = $('#selArtists').val();
    file.producers      = $('#selProducers').val();
    file.genres         = $('#selGenre').val();
    file.img            = dvUploadImg.attr('data-img-url');
    file.f_storage_id   = dvUploadImg.attr('data-storage-id');

    if (file.title === '') {
        swal('Eh!', 'Please enter title of the file!', 'error');
    } else if (file.artists.indexOf(file.artist) !== -1) {
        swal('OH no!', 'Main artist cannot be a featured artist!', 'error');
    }else if (file.releaseDate === '') {
        swal('Eh!', 'Please enter title of the file!', 'error');
    } else if (file.artist.length === 0) {
        swal('Eh!', 'Please select artist!', 'error');
    } else if (file.producers.length === 0) {
        swal('Eh!', 'Please select producers!', 'error');
    } else if (file.genres.length === 0) {
        swal('Eh!', 'Please select genres!', 'error');
    } else {
        if ($this.text() !== 'updating...') {
            $this.text('updating...');
            axiosrequest.put('/file/' + $this.attr('data-record-id'), file).then(function (response) {
                if (response.data.code === 100) {
                    $('.bs-example-modal-form').modal('hide');
                    swal('you made it!', response.data.message, 'success');
                } else {
                    $('.bs-example-modal-form').modal('hide');
                    swal('oH snap!', response.data.message, 'error');
                }
                $this.text('Update');
            }).catch(function (error) {
                console.log(error);
                $this.text('Update');
            });
        }
        dvUploadImg.html(initHtml);
    }
});

    $('.content-details').on('click', function (e) {
       e.preventDefault();
       axiosrequest.get('/file/'+$(this).attr('data-record-id')+'/details').then(function (response) {
            $('#bContentTitle').text(response.data[0].title);
            $('#imgContentImg').attr('src', response.data[0].img);
            $('#spnArtist').text((response.data[0].artist !== null)? response.data[0].artist.nick_name : 'Artist');
            $('#dvTotalPlays').html(response.data[1]);

            if (response.data[0].artists !== null){
                const all = response.data[0].artists.length;
                var countable = 1;
                var these_artists = '';
                $.each(response.data[0].artists, function (i, v) {
                    these_artists += v.nick_name;
                    if (countable !== all){
                        these_artists += ', ';
                    }
                    countable++;
                });
            } else {
                these_artists = 'None';
            }
            $('#spnFeatured').text(these_artists);

            if (response.data[0].producers !== null){
                const all = response.data[0].producers.length;
                var countable = 1;
                var these_producers = '';
                $.each(response.data[0].producers, function (i, v) {
                    these_producers += v.nick_name;
                    if (countable !== all){
                        these_producers += ', ';
                    }
                    countable++;
                });
            }
            $('#spnProducers').text(these_producers);

           if (response.data[0].genres !== null){
               const all = response.data[0].genres.length;
               var countable = 1;
               var these_genres = '';
               $.each(response.data[0].genres, function (i, v) {
                   these_genres += v.name;
                   if (countable !== all){
                       these_genres += ', ';
                   }
                   countable++;
               });
           }
           $('#spnGenres').text(these_genres);

            $('#spnAlbum').text((response.data[0].album !== null)? response.data[0].album.name : 'Unknown');
            $('#spnLabel').text((response.data[0].label !== null)? response.data[0].label.name : 'Unknown');
            $('#spnReleaseYear').text(response.data[0].release_date.split('-')[0]);

            $('#dvAirtimeRank').text((response.data[1] === 0)? 0 : response.data[2]);
            $('#spnFrstPlay').text((response.data[3] === null)? 'not played' : response.data[3]);
            $('#spnRecentPlay').text((response.data[4] === null)? 'not played' : response.data[4]);
            $('#mdlContentDetails').modal('show');
       });
    });

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
                                swal('yay!', 'upload successful!', 'success');
                            }).catch(function (error) { console.log(error); });

                        });

                    } else {
                        axiosrequest.post('', data).then(function (response) {
                            $('#frmSongUpload').empty();
                            $('#upload-opt').fadeIn();
                            swal('yay!', 'upload successful!', 'success');
                        }).catch(function (error) { console.log(error); });
                    }
                });
            }
        } else {
            swal('violation', 'No file found in the file container specified!', 'error');
        }
    };
});