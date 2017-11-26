@extends('layouts.master')
@section('title')
    Dashboard
@endsection
@section('content')
<div class="page-content container-fluid">
    <!--Dashboard Cards-->
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
            <div class="widget no-border overlay-container">
                <img src="{{asset('images/backgrounds/03.jpg')}}" alt="" class="overlay-bg img-responsive">
                <div class="overlay-content p-10">
                    <div class="clearfix">
                        <div class="pull-left">
                        <!--<img src="{{asset('images/users/Kofi-Kinaata-Susuka-Cover-artwork.jpg')}}" alt="" width="100" class="media-object img-thumbnail">-->
                            <i class="fs-60 zmdi zmdi-play-circle-outline"></i>
                            <div class="mt-15 mb-5 fw-500 fs-17">{{date('l')}}</div>
                            <div class="fs-15">{{\Carbon\Carbon::today()->toDateString()}}</div>
                        </div>
                        <div class="pull-right text-right">
                            <div class="fs-17">
                                <strong>Plays Today</strong>
                            </div>
                            <div class="fs-45 fw-700">
                                <span id="today-plays" class="counter">0</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
            <div class="widget no-border overlay-container">
                <img src="{{asset('images/backgrounds/music.jpg')}}" alt="" class="overlay-bg img-responsive">
                <div class="overlay-content p-10">
                    <div class="clearfix">
                        <div class="pull-left">
                            <i class="fs-60 zmdi zmdi-trending-up"></i>
                        <!--<img src="{{asset('images/users/Kofi-Kinaata-Susuka-Cover-artwork.jpg')}}" alt="" width="65" width="65" class="media-object img-thumbnail">-->
                            <div class="mt-15 mb-5 fw-500 fs-17">
                                <strong id="most-played-title">Title</strong>
                            </div>
                            <div id="most-played-artist" class="fs-15">Artist</div>
                        </div>
                        <div class="pull-right text-right">
                            <div class="fs-17">
                                <strong>Most Played</strong>
                            </div>
                            <div class="fs-45 fw-700">
                                <span id="most-played" class="counter">0</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
            <div class="widget no-border overlay-container">
                <img src="{{asset('images/backgrounds/23.jpg')}}" alt="" class="overlay-bg img-responsive">
                <div class="overlay-content p-10">
                    <div class="clearfix">
                        <div class="pull-left">
                            <i class="fs-60 zmdi zmdi-trending-down"></i>
                        <!--<img src="{{asset('images/users/Kofi-Kinaata-Confession.jpg')}}" alt="" width="26%" height="26%" class="media-object img-thumbnail">-->
                            <div class="mt-15 mb-5 fw-500 fs-17">
                                <strong id="all-time-title">title</strong>
                            </div>
                            <div id="all-time-artist" class="fs-15">artist</div>
                        </div>
                        <div class="pull-right text-right">
                            <div class="fs-17">
                                <strong>All time best</strong>
                            </div>
                            <div class="fs-45 fw-700">
                                <span id="all-time-play" class="counter">0</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
            <div class="widget no-border overlay-container">
                <img src="{{asset('images/backgrounds/36.jpg')}}" alt="" class="overlay-bg img-responsive">
                <div class="overlay-content p-10">
                    <div class="clearfix">
                        <div class="pull-left">
                            <i class="fs-60 zmdi zmdi-mic-outline"></i>
                        <!--<img src="{{asset('images/users/live fm.png')}}" alt="" width="65" height="65" class="media-object img-thumbnail">-->
                            <div class="mt-15 mb-5 fw-700 fs-17">
                                <strong id="broadcaster-name">name</strong>
                            </div>
                            <div class="fs-15" id="broadcaster-country">country</div>
                        </div>
                        <div class="pull-right text-right">
                            <div class="fs-17">
                                <strong id="">Broadcaster</strong>
                            </div>
                            <div class="fs-45 fw-700"><span class="counter" id="broadcaster-plays">0</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Dashboard Cards-->
    <!--plays table-->
    <div class="row">
        <div class="col-sm-12">
            <div class="widget no-border table-responsive">
                <table id="daily-plays" class="table table-hover table-striped table-bordered table-condensed">
                    <thead>
                        <tr>
                            <th class="text-center">Title</th>
                            <th class="text-center">Artist</th>
                            <th class="text-center">Broadcaster</th>
                            <th class="text-center">Played</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
        {{--<div class="col-md-4">--}}
            {{--<div class="widget">--}}
                {{--<div class="widget-heading clearfix">--}}
                    {{--<h3 class="widget-title pull-left">Top 3 Categories</h3>--}}
                {{--</div>--}}
                {{--<div class="widget-body">--}}
                    {{--<div class="widget no-border">--}}
                        {{--<div style="height: 200px" class="overlay-container overlay-color">--}}
                            {{--<img src="{{asset('images/backgrounds/36.jpg')}}" alt="" class="overlay-bg img-responsive">--}}
                        {{--</div>--}}
                        {{--<div style="position: relative">--}}
                            {{--<a href="#" style="position: absolute; top: -180px; left: 50%; margin-left: -80px; border-radius: 50%; padding: 3px; background-color: #FFF">--}}
                                {{--<img src="{{asset('images/users/live fm.png')}}" width="150" alt="" class="img-circle">--}}
                            {{--</a>--}}
                        {{--</div>--}}

                        {{--<div class="row row-0 p-15 text-center bg-black">--}}
                            {{--<div class="col-xs-6">--}}
                                {{--<div class="fs-20 fw-500">208</div>--}}
                                {{--<div class="text-muted">Total Plays</div>--}}
                            {{--</div>--}}
                            {{--<div class="col-xs-6">--}}
                                {{--<div class="fs-20 fw-500">Confession</div>--}}
                                {{--<div class="text-muted">Most Played</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div style="margin: 0 -20px -20px -20px" class="table-responsive">--}}
                        {{--<table class="table table-hover mb-0">--}}
                            {{--<thead>--}}
                            {{--<tr>--}}
                                {{--<th style="width:40%">Position</th>--}}
                                {{--<th style="width:30%">Broadcaster</th>--}}
                                {{--<th style="width:30%">Up/Down</th>--}}
                            {{--</tr>--}}
                            {{--</thead>--}}
                            {{--<tbody>--}}
                            {{--<tr>--}}
                                {{--<td class="text-center">1</td>--}}
                                {{--<td>Peace FM</td>--}}
                                {{--<td class="text-success text-center"><i class="ti-arrow-up"></i></td>--}}
                            {{--</tr>--}}
                            {{--<tr>--}}
                                {{--<td class="text-center">2</td>--}}
                                {{--<td>Y FM</td>--}}
                                {{--<td class="text-danger text-center"><i class="ti-arrow-down"></i></td>--}}
                            {{--</tr>--}}
                            {{--<tr>--}}
                                {{--<td class="text-center">3</td>--}}
                                {{--<td>Metro-FM</td>--}}
                                {{--<td class="text-success text-center"><i class="ti-arrow-up"></i></td>--}}
                            {{--</tr>--}}
                            {{--</tbody>--}}
                        {{--</table>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}

    </div>
    <!--END plays table-->
</div>
@endsection