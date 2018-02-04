{{--JQuery--}}

<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>

<!-- Forms Wizard -->

<script type="text/javascript" src="{{asset('js/forms-wizard.js')}}"></script>

<!-- loader-->
<script type="text/javascript" src="{{asset('plugins/loader/loader.js')}}"></script>

<!-- Jvector Map-->
<script type="text/javascript" src="{{asset('plugins/jvectormap/jquery-jvectormap-2.0.3.min.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/jvectormap/maps/jquery-jvectormap-world-mill.js')}}"></script>
<!-- Morris Chart-->
<script type="text/javascript" src="{{asset('plugins/raphael/raphael-min.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/morris.js/morris.min.js')}}"></script>
<!-- Chartist -->
<script type="text/javascript" src="{{asset('plugins/chartist/dist/chartist.min.js')}}"></script>

    


{{--<script type="text/javascript" src="https://cdn.datatables.net/v/bs/dt-1.10.15/b-1.3.1/datatables.min.js"></script>--}}

{{--Moment JS--}}

<script type="text/javascript" src="{{asset('js/moment.min.js')}}"></script>

{{--Datepicker JS--}}

<script type="text/javascript" src="{{asset('js/bootstrap-datepicker.min.js')}}"></script>

<script type="text/javascript" src="{{asset('js/countUp.js')}}"></script>

<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>



<script src="https://www.gstatic.com/firebasejs/4.1.1/firebase.js"></script>

<script>

    // Initialize Firebase

    var config = {

        apiKey: "AIzaSyCjWmI30jBmMU4tTrThcn4qpGnYcvpZ7kU",

        authDomain: "qisimah-4403d.firebaseapp.com",

        databaseURL: "https://qisimah-4403d.firebaseio.com",

        projectId: "qisimah-4403d",

        storageBucket: "qisimah-4403d.appspot.com",

        messagingSenderId: "744307183277"

    };

    firebase.initializeApp(config);

</script>

<script src="https://maps.googleapis.com/maps/api/js?libraries=visualization&key=AIzaSyDpHCatZelD9NgEDQDdTPdP3anWsZPPAF8"

        async defer></script>

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

    });
</script>

<script type="text/javascript" src="{{asset('js/reportsdash.js')}}"></script>