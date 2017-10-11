{{--JQuery--}}
<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
{{--Moment JS--}}
<script type="text/javascript" src="{{asset('js/moment.min.js')}}"></script>
{{--Datepicker JS--}}
<script type="text/javascript" src="{{asset('js/bootstrap-datepicker.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/countUp.js')}}"></script>
<script type="text/javascript" src="{{asset('js/app.js')}}"></script>
<script type="text/javascript">
    $(document).ready( function () {
        var axiosrequest = axios.create({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
            }
        });

        $('#login').on('click', function (e) {
            e.preventDefault();
            $(this).text('please wait...');
            var user = {};
            user.userEmail      = $('#userEmail').val();
            user.userPassword   = $('#userPassword').val();
            user.userRemember   = ($('input[name="remember"]').is(':checked'))? true : false;

            axiosrequest.post('/login', user).then(function (response) {
                $('#login').text('redirecting...');
                window.location.href = '/';
            }).catch(function (error) {
                if (error.response.status === 422){
                    var message = error.response.data;
                    for (var key in message){
                        $('#'+key).parent('div').prepend('<label class="text-warning">'+message[key]+'</label>');
                    }
                } else {
                    alert('Something went wrong, please refresh the page and try again!');
                }
                $('#login').text('sign in');
            });
        });
        $('.file-style').filestyle();
    });
</script>
</body>
</html>