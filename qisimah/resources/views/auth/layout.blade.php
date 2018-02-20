<html lang="en" style="vh: 100">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="token" content="{{csrf_token()}}">
    <title>Qisimah Audio Insights - Login</title>
    <!-- PACE-->
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/PACE/themes/blue/pace-theme-flash.css')}}">
    <script type="text/javascript" src="{{asset('plugins/PACE/pace.min.js')}}"></script>
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/bootstrap/dist/css/bootstrap.min.css')}}">
    <!-- Fonts-->
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/themify-icons/themify-icons.css')}}">
    <!-- Primary Style-->
    <link rel="stylesheet" type="text/css" href="{{asset('css/fourth-layout.css')}}">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
    <!-- WARNING: Respond.js doesn't work if you view the page via file://-->
    <!--[if lt IE 9]>
    <script type="text/javascript" src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script type="text/javascript" src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body style="background-image: url({{asset('images/landing/musicbg.jpg')}})" class="body-bg-full">
<div class="container page-container">
    <div class="page-content">
        <div class="logo">
            <img src="{{asset('images/logo/logo-sm-light.png')}}" alt="" width="80">
        </div>
        @yield('content')
    </div>
</div>
@include('components.scripts')