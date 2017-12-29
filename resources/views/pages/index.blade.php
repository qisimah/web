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

                            <i class="fs-60 zmdi zmdi-star-circle"></i>

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

    <!--END plays table-->

    <div class="row">
        <div class="col-lg-12">
            <div class="widget clear">
                <div class="widget-heading clearfix">
                    <h3 class="widget-title text-center">Live Detections</h3>
                </div>
                <div class="widget-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="widget no-border">
                                <table id="live-detection" style="width: 100%"
                                       class="table table-hover table-bordered">
                                    <thead>
                                    <tr>
                                        <th style="width:35%" class="">Song</th>
                                        <th style="width:30%" class="">Broadcaster</th>
                                        <th style="width:15%" class="text-center">Time Played</th>
                                        <th style="width:10%" class="text-right">Plays Today</th>
                                        <th style="width:10%" class="text-right">This Week</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection