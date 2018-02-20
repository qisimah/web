$(document).ready( function () {
    $('.delete-album').on('click', function (event) {
        event.preventDefault();
        const $that = $(this);
        swal({
            title: 'Hey!',
            text: 'This will remove this awesome album from your life!',
            type: 'warning',
            showCancelButton: true,
            showConfirmButton: true,
            confirmButtonText: 'delete it!',
            cancelButtonText: 'Don\'t proceed',
            confirmButtonColor: '#FF0000',
            buttonsStyling: false,
            showLoaderOnConfirm: true
        },
            function () {
                $that.attr('disabled', true);
                $that.closest('form').submit();
            });
    });
});