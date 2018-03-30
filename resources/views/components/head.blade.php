<?php
if ($user['active'] === 2) {
    redirect('/account/password/create');
}
?>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta id="token" name="token" content="{{csrf_token()}}">
<title>Qisimah Audio Insights - Dashboard</title>
<!-- PACE-->
<link rel="stylesheet" type="text/css" href="{{asset('plugins/PACE/themes/blue/pace-theme-flash.css')}}">
<script type="text/javascript" src="{{asset('plugins/PACE/pace.min.js')}}"></script>
<!-- Bootstrap CSS-->
<link rel="stylesheet" type="text/css" href="{{asset('plugins/bootstrap/dist/css/bootstrap.min.css')}}">
<!-- Fonts-->
<link rel="stylesheet" type="text/css" href="{{asset('plugins/themify-icons/themify-icons.css')}}">
<!-- Malihu Scrollbar-->
<link rel="stylesheet" type="text/css"
      href="{{asset('plugins/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css')}}">
<!-- Flag Icons-->
<link rel="stylesheet" type="text/css" href="{{asset('plugins/flag-icon-css/css/flag-icon.min.css')}}">
<!-- Bootstrap Progressbar-->
<link rel="stylesheet" type="text/css"
      href="{{asset('plugins/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')}}">
<!-- Slick Carousel-->
<link rel="stylesheet" type="text/css" href="{{asset('plugins/slick-carousel/slick/slick.css')}}">
<!-- SpinKit-->
<link rel="stylesheet" type="text/css" href="{{asset('spinable.css')}}">
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<!-- Animo.js-->
<link rel="stylesheet" type="text/css" href="{{asset('plugins/animo.js/animate-animo.min.css')}}">
<!-- Animo.js-->
<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-datepicker.standalone.min.css')}}">
<!-- Jvector Map-->
<link rel="stylesheet" type="text/css" href="{{asset('plugins/jvectormap/jquery-jvectormap-2.0.3.css')}}">
<!-- Morris Chart-->
<link rel="stylesheet" type="text/css" href="{{asset('plugins/morris.js/morris.css')}}">
{{--<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">--}}
<!-- Chartist-->
<link rel="stylesheet" type="text/css" href="{{asset('plugins/chartist/dist/chartist.min.css')}}">
<!-- DataTables-->
<link rel="stylesheet" type="text/css"
      href="{{asset('plugins/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
<link rel="stylesheet" type="text/css"
      href="{{asset('plugins/datatables.net-buttons-bs/css/buttons.bootstrap.min.css')}}">
<link rel="stylesheet" type="text/css"
      href="{{asset('plugins/datatables.net-colreorder-bs/css/colReorder.bootstrap.min.css')}}">
<link rel="stylesheet" type="text/css"
      href="{{asset('plugins/datatables.net-responsive-bs/css/responsive.bootstrap.min.css')}}">

<!-- Material Design Iconic Font-->

<link rel="stylesheet" type="text/css"
      href="{{asset('plugins/material-design-iconic-font/dist/css/material-design-iconic-font.min.css')}}">
<!-- Primary Style-->
<link rel="stylesheet" type="text/css" href="{{asset('css/chosen.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/fourth-layout.css')}}">
{{--Sweet Alert--}}
<link rel="stylesheet" type="text/css" href="{{asset('css/sweetalert.css')}}">

{{--MultiSelect CSS--}}

<link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css"
      type="text/css">
<style>
    .sweet-alert input.form-control {
        display: initial;
    }

</style>

<link rel="stylesheet" href="{{ asset('css/upload.css') }}">

<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css"/>
<script type="text/javascript" src="{{asset('js/sweetalert.min.js')}}"></script>
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
<!-- WARNING: Respond.js doesn't work if you view the page via file://-->
<!--[if lt IE 9]>
<script type="text/javascript" src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script type="text/javascript" src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css"/>