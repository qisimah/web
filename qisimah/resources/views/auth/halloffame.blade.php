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
                      <h2 class="fs-60" style="color: white;"><strong>Hall of Fame  </strong></h2>
                      <!-- <div class="fs-20">Africa</div> -->
                    </div>
                  </div>
                  <div class="text-center">
                  <br>
                  <br>
                  <br>
                  <h3 class="widget-title"><a href="{{url('charts')}}"><button type="submit" class="btn btn-raised btn-primary">Back to Charts</button></a></h3>
                    <!--<button type="button" class="btn btn-raised btn-block btn-default">Edit</button>-->
                  </div>
                </div>
              <!-- </div> -->
            </div>
          </div>
          <div class="row ml-10 mr-10 pt-10">

            <div class="col-md-10  col-md-offset-1 text-center">
            
            
            <!-- <div class="widget-heading">

              <h3 class="widget-title"><button type="submit" class="btn btn-raised btn-primary"><i class="ti-plus mr-5"></i>Add New Content</button></h3>
            </div> -->
            <div class="col-sm-3">

              <a href="{{url('top24')}}" ><img src="{{asset('/images/charts/Big-Shaq.jpeg')}}" width="300" alt="" style="margin:0px;" class="img-thumbnail img-responsive"></a>
              <h1 style="color:#fff">1</h1>
              <h4 style="color:#fff">Total Plays: <strong>3,000</strong></h4>
              <h4 style="color:#fff">Date Joined: <strong>12, November 2017</strong></h4>
            </div>
            <div class="col-sm-3">

              <a href="{{url('top7')}}" ><img src="{{asset('/images/charts/Becca.jpg')}}" width="300" alt="" style="margin:0px;" class="img-thumbnail img-responsive"></a>
              <h1 style="color:#fff">2</h1>
              <h4 style="color:#fff">Total Plays: <strong>3,000</strong></h4>
              <h4 style="color:#fff">Date Joined: <strong>12, November 2017</strong></h4>
            </div>
            <div class="col-sm-3">

              <a href="{{url('top30')}}" ><img src="{{asset('/images/charts/Ebony-Hustle.jpg')}}" width="300" alt="" style="margin:0px;" class="img-thumbnail img-responsive"></a>
              <h1 style="color:#fff">3</h1>
              <h4 style="color:#fff">Total Plays: <strong>3,000</strong></h4>
              <h4 style="color:#fff">Date Joined: <strong>12, November 2017</strong></h4>
            </div>
            <div class="col-sm-3">

              <a href="{{url('halloffame')}}" ><img src="{{asset('/images/charts/Sarkodie-Highest.jpg')}}" width="300" alt="" style="margin:0px;" class="img-thumbnail img-responsive"></a>
              <h1 style="color:#fff">4</h1>
              <h4 style="color:#fff">Total Plays: <strong>3,000</strong></h4>
              <h4 style="color:#fff">Date Joined: <strong>12, November 2017</strong></h4>
            </div>

                          
              
              
            </div>
            
            
            
            
          </div>
        <!-- </div> -->
                <!-- <div class="text-center" style="color: white">2017 &copy;
                  <a style="color: white" href="http://qisimah.com">Qisimah Audio Insights</a>
                </div> -->

      </div>
@endsection
