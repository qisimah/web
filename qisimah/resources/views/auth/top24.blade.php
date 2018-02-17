@extends('auth.chart-layout')

@section('content')
    <div class="">
        <div class="row row-0">
            <div class="col-lg-12">
                <div style="padding: 120px 30px 30px 30px" class="overlay-content clearfix">
                    <div class="media">
                        <div style="width: auto" class="media-middle text-center">
                            <img src="{{asset('images/logo/logo-light.png')}}"
                                 alt="{{$chart_title ?? 'Qisimah Music Charts'}}" style="width:25%;"/>
                            <h2 class="fs-60" style="color: white;"><strong>{{$chart_title}} </strong><label
                                        class="label label-danger" style="font-size: 17px">Live</label></h2>
                            <h2 class="fs-20" style="color: white;">
                                <strong>{{$chart_date}}</strong></h2>
                        </div>
                    </div>
                    <div class="text-center">
                        <br>
                        <br>
                        <br>
                        <h3 class="widget-title"><a href="{{url('chart')}}">
                                <button type="submit" class="btn btn-primary">Back to Charts</button>
                            </a></h3>
                    </div>
                </div>
                <!-- </div> -->
            </div>
        </div>
        <div class="row ml-10 mr-10 pt-10">

            <div class="col-md-8  col-md-offset-2">

                <div class="widget">
                    <div class="widget-body">
                        @if(count($entries))
                            @foreach($entries as $entry)

                                <div class="row"
                                     style="background-color: white; min-height: 135px; display: flex; flex-flow: row wrap">
                                    <div class="col-lg-3 col-md-4 col-xs-12"
                                         style="display: flex; justify-content: center; align-items: center; height: inherit; background-color: #f0f0f0">
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
                                            <h5 style="color: grey; margin-top: 0; font-size: 1em">
                                                Previously: {{$entry['prev_position']}}</h5>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-8 col-sm-6 col-xs-12">
                                        <div class="row" style="display: flex">
                                            <div class="text-center">
                                                <img src="{{$entry['album_art']}}" class="img-responsive">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-6 col-xs-12 text-center"
                                         style="display: flex; flex-direction: column; justify-content: center">
                                        <p style="color: black; font-size: 1.3em;" class="text-bold">{{$entry['title']}}</p>
                                        <p style="font-size: 1em;">{{$entry['artists']}}</p>
                                        <p style="font-size: 1em;">{{$entry['genres']}} : {{$entry['producers']}}</p>
                                    </div>
                                    <div class="col-lg-3 col-sm-12 col-xs-12" style="background-color: #f0f0f0;">
                                        <div class="row"
                                             style="display: flex; justify-content: center; justify-items: center">
                                            <div class="col-xs-4 text-center" style="padding-top: 20px">
                                                <div>
                                                    <p style="font-size: 1em">Peak Position</p>
                                                    <strong style="font-size: 2em">{{$entry['peak_position']}}</strong>
                                                </div>
                                            </div>

                                            <div class="col-xs-4 text-center" style="padding-top: 20px">
                                                <div>
                                                    <p style="font-size: 1em">Chart {{$chart_unit}}</p>
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
                                        <strong style="color: black; font-size: 25px;">Sorry boss! No chart data
                                            available at the moment.</strong>
                                    </td>
                                </tr>
                            </table>
                        @endif
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
