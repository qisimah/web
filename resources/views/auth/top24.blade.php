@extends('auth.chart-layout')

@section('content')
    <div class="">

        <!-- <div class="page-content container-fluid p-0"> -->
        <div class="row row-0">
            <div class="col-lg-12">
                <!-- <div class="overlay-container text-white"><img src="../build/images/chart/details.jpg" alt="" class="overlay-bg img-responsive"> -->
                <div style="padding: 120px 30px 30px 30px" class="overlay-content clearfix">
                    <div class="media text-center">
                        <!-- <div class="media-left"><a href="javascript:void(0)" style="display: block; border-radius: 50%; padding: 3px; background-color: #fff;"><img src="../build/images/users/Kofi-Kinaata-1.jpg" width="100" alt="" class="media-object img-circle"></a></div> -->
                        <div style="width: auto" class=" media-middle text-center">
                            <img src="{{asset('images/logo/logo-light.png')}}" style="width:10%;"/>
                            <h2 class="fs-60" style="color: white;"><strong>Top 24 Chart </strong><label
                                        class="label label-danger" style="font-size: 17px">Live</label></h2>
                            <h2 class="fs-20" style="color: white;">
                                <strong>{{\Carbon\Carbon::today()->format('l jS \\of F Y')}}</strong></h2>
                            <!-- <div class="fs-20">Africa</div> -->
                        </div>
                    </div>
                    <div class="text-center">
                        <br>
                        <br>
                        <br>
                        <h3 class="widget-title"><a href="{{url('chart')}}">
                                <button type="submit" class="btn btn-raised btn-primary">Back to Charts</button>
                            </a></h3>
                        <!--<button type="button" class="btn btn-raised btn-block btn-default">Edit</button>-->
                    </div>
                </div>
                <!-- </div> -->
            </div>
        </div>
        <div class="row ml-10 mr-10 pt-10">

            <div class="col-md-8  col-md-offset-2">

                <div class="widget">
                    <!-- <div class="widget-heading">

                      <h3 class="widget-title"><button type="submit" class="btn btn-raised btn-primary"><i class="ti-plus mr-5"></i>Add New Content</button></h3>
                    </div> -->
                    <div class="widget-body">
                        {{--<div class="row" style="background-color: white; min-height: 135px; display: flex; flex-flow: row wrap">--}}
                            {{--<div class="col-lg-3 col-md-4 col-xs-12" style="display: flex; justify-content: center; align-items: center; height: inherit; background-color: #f0f0f0">--}}
                                {{--<div class="col-lg-4 col-md-4 col-sm-12 col-xs-3 text-center">--}}
                                    {{--@if($entry['position'] > $entry['prev_position'] && $entry['prev_position'] <> 0)--}}
                                    {{--<i class="ti-arrow-down fs-22 text-danger"></i>--}}
                                    {{--@elseif($entry['position'] == $entry['prev_position'])--}}
                                    {{--<i class="ti-arrow-right fs-22 text-default"></i>--}}
                                    {{--@elseif($entry['position'] < $entry['prev_position'] && $entry['prev_position'] <> 0)--}}
                                    {{--<i class="ti-arrow-up fs-22 text-success"></i>--}}
                                    {{--@elseif($entry['prev_position'] == '0')--}}
                                    {{--<label class="label label-success" style="font-size: 17px">new</label>--}}
                                    {{--@endif--}}
                                    {{--<i class="ti-arrow-down fs-22 text-danger"></i>--}}
                                    {{--<label class="label label-success" style="font-size: 17px">new</label>--}}
                                {{--</div>--}}
                                {{--<div class="col-lg-8 col-md-8 col-sm-12 col-xs-9 text-center">--}}
                                    {{--<label class="fs-60" style="color: black">8</label>--}}
                                    {{--<h5 style="color: grey; margin-top: 0;">Prev--}}
                                        {{--Position: 2</h5>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="col-lg-2 col-md-8 col-sm-6 col-xs-12">--}}
                                {{--<div class="row" style="display: flex">--}}
                                    {{--<div class="text-center">--}}
                                        {{--<img src="{{asset('images/charts/Becca.jpg')}}" class="img-responsive">--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="col-lg-4 col-md-12 col-sm-6 col-xs-12 text-center" style="display: flex; flex-direction: column; justify-content: center">--}}
                                {{--<strong style="color: black; font-size: 25px;">Title of the song</strong>--}}
                                {{--<p style="font-size: 15px;">Artist Names</p>--}}
                            {{--</div>--}}
                            {{--<div class="col-lg-3 col-sm-12 col-xs-12" style="background-color: #f0f0f0;">--}}
                                {{--<div class="row" style="display: flex; justify-content: center; justify-items: center">--}}
                                    {{--<div class="col-xs-4 text-center" style="padding-top: 20px">--}}
                                        {{--<div>--}}
                                            {{--<div>Peak Position</div>--}}
                                            {{--<br>--}}
                                            {{--<strong style="font-size: 2em">1</strong>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}

                                    {{--<div class="col-xs-4 text-center" style="padding-top: 20px">--}}
                                        {{--<div>--}}
                                            {{--<div>Chart Days</div>--}}
                                            {{--<br>--}}
                                            {{--<strong style="font-size: 2em">2</strong></div>--}}
                                        {{--</div>--}}
                                    {{--<div class="col-xs-4 text-center" style="padding-top: 20px">--}}
                                        {{--<div>--}}
                                            {{--<div>Total Airplays</div>--}}
                                            {{--<br>--}}
                                            {{--<strong style="font-size: 2em">3</strong>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        @if(count($entries))
                            @foreach($entries as $entry)

                                <div class="row" style="background-color: white; min-height: 135px; display: flex; flex-flow: row wrap">
                                    <div class="col-lg-3 col-md-4 col-xs-12" style="display: flex; justify-content: center; align-items: center; height: inherit; background-color: #f0f0f0">
                                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-3 text-center">
                                            @if($entry['position'] > $entry['prev_position'] && $entry['prev_position'] <> 0)
                                                <i class="ti-arrow-down fs-22 text-danger"></i>
                                            @elseif($entry['position'] == $entry['prev_position'])
                                                <i class="ti-arrow-right fs-22 text-default"></i>
                                            @elseif($entry['position'] < $entry['prev_position'] && $entry['prev_position'] <> 0)
                                                <i class="ti-arrow-up fs-22 text-success"></i>
                                            @elseif($entry['prev_position'] == '0')
                                                <label class="label label-success" style="font-size: 0.9em">new</label>
                                            @endif
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-9 text-center">
                                            <label style="color: black; font-size: 3.5em">{{$entry['position']}}</label>
                                            <h5 style="color: grey; margin-top: 0; font-size: 1em">Previously: {{$entry['prev_position']}}</h5>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-8 col-sm-6 col-xs-12">
                                        <div class="row" style="display: flex">
                                            <div class="text-center">
                                                <img src="{{$entry['album_art']}}" class="img-responsive">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-6 col-xs-12 text-center" style="display: flex; flex-direction: column; justify-content: center">
                                        <strong style="color: black; font-size: 1.3em;">{{$entry['title']}}</strong>
                                        <p style="font-size: 1em;">{{$entry['artists']}}</p>
                                    </div>
                                    <div class="col-lg-3 col-sm-12 col-xs-12" style="background-color: #f0f0f0;">
                                        <div class="row" style="display: flex; justify-content: center; justify-items: center">
                                            <div class="col-xs-4 text-center" style="padding-top: 20px">
                                                <div>
                                                    <p style="font-size: 1em">Peak Position</p>
                                                    <strong style="font-size: 2em">{{$entry['peak_position']}}</strong>
                                                </div>
                                            </div>

                                            <div class="col-xs-4 text-center" style="padding-top: 20px">
                                                <div>
                                                    <p style="font-size: 1em">Chart Days</p>
                                                    <strong style="font-size: 2em">{{$entry['duration']}}</strong></div>
                                            </div>
                                            <div class="col-xs-4 text-center" style="padding-top: 20px">
                                                <div>
                                                    <p style="font-size: 1em">Total Airplays</p>
                                                    <strong style="font-size: 2em">{{$entry['plays']}}</strong>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                            @endforeach
                        @else
                            <table class="table table-responsive">
                                <tr>
                                    <td class="text-center"
                                        style="background-color: #f0f0f0; height: 130px; width: 22px;" colspan="7">

                                        <i class="ti-arrow-down fs-22 text-danger"></i>
                                        <strong style="color: black; font-size: 25px;">Sorry boss! No chart data
                                            available at the moment.</strong>
                                    </td>
                                </tr>
                            </table>
                        @endif

                        <div class="row">
                            <br>
                        </div>

                        {{--<table id="product-list" style="width: 100%; background-color: white;"--}}
                               {{--class="table table-hover dt-responsive nowrap">--}}
                            {{--<thead>--}}
                            {{--</thead>--}}
                            {{--<tbody>--}}
                            {{--@if(count($entries))--}}
                                {{--@foreach($entries as $entry)--}}
                                    {{--<tr>--}}
                                        {{--<td class="" style="background-color: #f0f0f0; height: 130px; width: 22px;">--}}
                                            {{--@if($entry['position'] > $entry['prev_position'] && $entry['prev_position'] <> 0)--}}
                                                {{--<i class="ti-arrow-down fs-22 text-danger"></i>--}}
                                            {{--@elseif($entry['position'] == $entry['prev_position'])--}}
                                                {{--<i class="ti-arrow-right fs-22 text-default"></i>--}}
                                            {{--@elseif($entry['position'] < $entry['prev_position'] && $entry['prev_position'] <> 0)--}}
                                                {{--<i class="ti-arrow-up fs-22 text-success"></i>--}}
                                            {{--@elseif($entry['prev_position'] == '0')--}}
                                                {{--<label class="label label-success" style="font-size: 17px">new</label>--}}
                                            {{--@endif--}}
                                        {{--</td>--}}
                                        {{--<td class="text-center">--}}
                                            {{--<label class="fs-60" style="color: black">{{$entry['position']}}</label>--}}
                                            {{--<h5 style="color: grey; margin-top: 0;">Prev--}}
                                                {{--Position: {{$entry['prev_position']}}</h5>--}}
                                        {{--</td>--}}
                                        {{--<td class="" width="20%"><img src="{{$entry['album_art']}}" width="100" alt=""--}}
                                                                      {{--class="img-thumbnail img-responsive"></td>--}}
                                        {{--<td class="col-sm-6"><strong--}}
                                                    {{--style="color: black; font-size: 25px;">{{$entry['title']}}</strong>--}}
                                            {{--<p style="font-size: 15px;">--}}
                                                {{--{{$entry['artists']}}--}}
                                            {{--</p></td>--}}

                                        {{--<td class="text-center col-sm-2" style="background-color: #f0f0f0;">--}}
                                            {{--<div>Peak Position</div>--}}
                                            {{--<br>--}}
                                            {{--<strong style="font-size: 20px">{{$entry['peak_position']}}</strong>--}}
                                        {{--</td>--}}

                                        {{--<td class="text-center col-sm-2" style="background-color: #f0f0f0;">--}}
                                            {{--<div>Days on chart</div>--}}
                                            {{--<br>--}}
                                            {{--<strong style="font-size: 20px">{{$entry['duration']}}</strong></td>--}}
                                        {{--<td class="text-center col-sm-2" style="background-color: #f0f0f0">--}}
                                            {{--<div>Total Airplays</div>--}}
                                            {{--<br>--}}
                                            {{--<strong style="font-size: 20px">{{$entry['plays']}}</strong>--}}
                                        {{--</td>--}}
                                    {{--</tr>--}}
                                {{--@endforeach--}}
                            {{--@else--}}
                                {{--<tr>--}}
                                    {{--<td class="text-center"--}}
                                        {{--style="background-color: #f0f0f0; height: 130px; width: 22px;" colspan="7">--}}

                                        {{--<i class="ti-arrow-down fs-22 text-danger"></i>--}}
                                        {{--<strong style="color: black; font-size: 25px;">Sorry boss! No chart data--}}
                                            {{--available at the moment.</strong>--}}

                                    {{--</td>--}}
                                {{--</tr>--}}
                            {{--@endif--}}
                            {{--</tbody>--}}
                        {{--</table>--}}
                    </div>
                </div>
            </div>


        </div>
        <!-- </div> -->
        <div class="text-center" style="color: white">2017 &copy;
            <a style="color: white" href="http://qisimah.com">Qisimah Audio Insights</a>
        </div>

    </div>
@endsection
