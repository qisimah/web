$(document).ready( function () {
    $('.delete-album').on('click', function (event) {
        event.preventDefault();
        var $this = $(this);
        swal({
            title: 'Hey!',
            text: 'This will remove this awesome album from your life!',
            type: 'warning',
            showCancelButton: true,
            showConfirmButton: true,
            confirmButtonText: 'Coolio',
            cancelButtonText: 'Don\'t proceed',
            confirmButtonColor: '#E5343D'},
            function(){
                $this.parent('form').submit();
            }
        );
    });
});