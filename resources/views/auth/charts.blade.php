@extends('auth.chart-layout')

@section('content')
    <div class="">
        <div class="row row-0">
            <div class="col-lg-12">
                <div style="padding: 120px 30px 30px 30px" class="overlay-content clearfix">
                    <div class="media text-center">
                        <div style="width: auto" class=" media-middle text-center">
                            <img src="{{asset('images/logo/logo-light.png')}}"
                                 alt="{{$chart_title ?? 'Qisimah Music Charts'}}" style="width:25%;"/>
                            <h2 class="fs-60" style="color: white;"><strong>Qisimah Charts</strong></h2>
                        </div>
                    </div>
                    <div class="row text-center">
                        <h3 class="widget-title"><a href="{{url('welcome')}}">
                                <button type="submit" class="btn btn-primary">Back to Website</button>
                            </a></h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="row ml-10 mr-10 pt-10">
            <div class="col-md-10  col-md-offset-1 text-center">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-lg-3">
                        <a href="{{url('chart/top24')}}"><img src="{{asset('/images/charts/top24.jpg')}}" width="300"
                                                              alt="" style="margin:0px;"
                                                              class="img-thumbnail img-responsive"></a>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-lg-3">
                        <a href="{{url('chart/top7')}}"><img src="{{asset('/images/charts/top7.jpg')}}" width="300"
                                                             alt="" style="margin:0px;"
                                                             class="img-thumbnail img-responsive"></a>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-lg-3">
                        <a href="{{url('chart/top30')}}"><img src="{{asset('/images/charts/top30.jpg')}}" width="300"
                                                              alt="" style="margin:0px;"
                                                              class="img-thumbnail img-responsive"></a>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-lg-3">
                        <a href="{{url('chart/halloffame')}}"><img src="{{asset('/images/charts/halloffame.jpg')}}"
                                                                   width="300" alt="" style="margin:0px;"
                                                                   class="img-thumbnail img-responsive"></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- </div> -->

        <div class="row">
            <br>
            <div class="text-center" style="color: white">2017 &copy;
                <a style="color: white" href="http://qisimah.com">Qisimah Audio Insights</a>
            </div>
        </div>

    </div>
@endsection
