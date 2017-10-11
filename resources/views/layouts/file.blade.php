@extends('layouts.master')
@section('title')
    File Uploads
@endsection
@section('content')
<div class="page-content container-fluid">
    <div class="row">
        <div class="col-xs-12 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1">
            <div class="widget">
                <div class="widget-heading">
                    <h3 class="widget-title">@yield('fileType')</h3>
                </div>
                <div class="widget-body">
                    @yield('form')
                </div>
            </div>
        </div>
    </div>
</div>
@stop