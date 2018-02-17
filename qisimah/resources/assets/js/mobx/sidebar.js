$(document).ready(function () {
    $('#txtProPic').change(function () {
        var file = document.getElementById('txtProPic');
        var user = {};
        var storage = firebase.storage();
        var axiosrequest = axios.create({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
            }
        });

        user.id = $('#txtProPic').attr('data-user');
        var fileStorage = storage.ref(user.id+ '.' + file.files[0].type.split('/')[1]);

        var uploading = fileStorage.put(file.files[0]);

        swal('relax', 'Silent upload in progress, your picture change when successful', 'info');

        uploading.on('state_changed', function (snapShot) {
            // Observe state change events such as progress, pause, and resume
            // Get task progress, including the number of bytes uploaded and the total number of bytes to be uploaded
            var progressBar = Math.round((snapShot.bytesTransferred / snapShot.totalBytes) * 100);

            $(document).ready(function () {
                $('#divProPic').attr('data-percent', progressBar);
            });
        }, function (error) {
            return console.log(error);
        }, function () {
            user.img = uploading.snapshot.downloadURL;
            axiosrequest.post('/user/'+user.id+'/update', user).then(function (response) {
                $('#imgProPic').attr('src', user.img);
            }).catch(function (error) {
                swal('iesh', 'Sorry, updating your profile failed. Please try again later', 'error');
            });
        });
    });
});