$(document).ready( function () {
    $('.delete-album').on('click', function (event) {
        event.preventDefault();
        swal({
            title: 'Hey!',
            text: 'This will remove this awesome album from your life!',
            type: 'warning',
            showCancelButton: true,
            showConfirmButton: true,
            confirmButtonText: 'Coolio',
            cancelButtonText: 'Don\'t proceed',
            confirmButtonClass: 'btn btn-danger'
        });
    });
});