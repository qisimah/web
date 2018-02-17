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
                      <h2 class="fs-60" style="color: white;"><strong>Top 30 Chart  </strong><label class="label label-danger" style="font-size: 17px">Live</label></h2>
                      <h2 class="fs-20" style="color: white;"><strong>November</strong></h2>
                      <!-- <div class="fs-20">Africa</div> -->
                    </div>
                  </div>
                  <div class="text-center">
                  <br>
                  <br>
                  <br>
                  <h3 class="widget-title"><a href="{{url('chart')}}"><button type="submit" class="btn btn-raised btn-primary">Back to Charts</button></a></h3>
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

              <table id="product-list" style="width: 100%; background-color: white;" class="table table-hover dt-responsive nowrap">
                <thead>
                </thead>
                <tbody>
                  <tr>
                    <td class="" style="background-color: #f0f0f0; height: 130px; width: 22px;">
                        <i class="ti-arrow-up fs-22 text-success"></i>
                   
                    </td>
                    <td class="text-center">
                        <label class="fs-60" style="color: black">1</label>
                        <h5 style="color: grey; margin-top: 0;" >Prev Position: 2</h5>
                    </td>
                    <td class=""><img src="{{asset('/images/products/01.jpg')}}" width="100" alt="" class="img-thumbnail img-responsive"></td>
                    <td class="col-sm-6"><strong style="color: black; font-size: 25px;">Title</strong><p style="font-size: 15px;">Artist/feature</p></td>
                    
                    <td class="text-center col-sm-1"  style="background-color: #f0f0f0;">
                      <div>Peak Position</div>
                      <br>
                      <strong style="font-size: 20px">4</strong>
                    </td>

                    <td class="text-center col-sm-1"  style="background-color: #f0f0f0;" ><div>Wks on chart</div>
                    <br>
                    <strong style="font-size: 20px">2</strong></td>
                    <td class="text-center col-sm-1" style="background-color: #f0f0f0">
                      <div>Total Airplays</div>
                      <br>
                      <strong style="font-size: 20px">2544</strong>
                    </td>
                    <!--<td class="text-center">
                      <div role="group" aria-label="Basic example" class="btn-group btn-group-sm">
                        <a type="button" class="btn btn-outline btn-primary" href="Reports-broadcaster-Qisimah.html"><i class="ti-eye"></i></a>
                        <button type="button" class="btn btn-outline btn-success"><i class="ti-microphone"></i></button>
                        <button type="button" class="btn btn-outline btn-danger"><i class="ti-close"></i></button>
                      </div>
                    </td>-->
                  </tr>
                  <tr>
                    <td class=""  style="background-color: #f0f0f0; height: 130px; width: 22px;">
                      
                        <i class="ti-arrow-down fs-22 text-danger"></i>
                      
                    </td>
                    <td class="text-center">
                      <label class="fs-60" style="color: black">2</label>
                      <h5 style="color: grey; margin-top: 0";>Prev Position: 1</h5> 
                      
                    </td>
                    <td class=""><img src="{{asset('/images/products/02.jpg')}}" width="100" alt="" class="img-thumbnail img-responsive"></td>
                    <td class="col-sm-6"><strong style="color: black; font-size: 25px;">Title</strong><p style="font-size: 15px;">Artist/feature</p></td>
                    <td class="text-center col-sm-1"  style="background-color: #f0f0f0">
                      <div>Peak Position</div>
                      <br>
                      <strong style="font-size: 20px">4</strong>
                    </td>
                    <td  class="text-center col-sm-1" style="background-color: #f0f0f0" >
                    <div>Wks on chart</div>
                    <br>
                    <strong style="font-size: 20px">4</strong></td>
                    <td class="text-center col-sm-1" style="background-color: #f0f0f0">
                      <div>Total Airplays</div>
                      <br>
                      <strong style="font-size: 20px">2044</strong>
                    </td>
                    <!--<td class="text-center">
                      <div role="group" aria-label="Basic example" class="btn-group btn-group-sm">
                        <a type="button" href="Reports-broadcaster-Qisimah.html" class="btn btn-outline btn-primary"><i class="ti-eye"></i></a>
                        <button type="button" class="btn btn-outline btn-success"><i class="ti-microphone"></i></button>
                        <button type="button" class="btn btn-outline btn-danger"><i class="ti-close"></i></button>
                      </div>
                    </td>-->
                  </tr>
                  <tr>
                    <td class="" style="background-color: #f0f0f0; height: 130px; width: 22px;">

                        <i class="ti-arrow-right fs-22 text-primary"></i>

                    </td>
                    <td class="text-center col-sm-2">
                      <label class="fs-60" style="color: black">3</label> 
                      <h5 style="color: grey; margin-top: 0" ;>Prev Position: 3</h5>
                      
                    </td>
                    <td class="col-sm-2"><img src="{{asset('/images/products/03.jpg')}}" width="100" alt="" class="img-thumbnail img-responsive"></td>
                    <td class="col-sm-6"><strong style="color: black; font-size: 25px;">Title</strong><p style="font-size: 15px;">Artist/feature</p></td>
                    <td class="text-center col-sm-1"  style="background-color: #f0f0f0"><div>Peak Position</div> <br><strong style="font-size: 20px">3</strong></td>
                    <td  class="text-center col-sm-1" style="background-color: #f0f0f0" >
                    <div>Wks on chart</div>
                    <br>
                    <strong style="font-size: 20px">2</strong></td>
                    <td  class="text-center col-sm-1" style="background-color: #f0f0f0" >
                    <div>Total Airplays</div>
                    <br>
                    <strong style="font-size: 20px">1244</strong></td>
                    
                    <!--<td class="text-center">
                      <div role="group" aria-label="Basic example" class="btn-group btn-group-sm">
                        <a type="button" href="Reports-broadcaster-Qisimah.html" class="btn btn-outline btn-primary"><i class="ti-eye"></i></a>
                        <button type="button" class="btn btn-outline btn-success"><i class="ti-microphone"></i></button>
                        <button type="button" class="btn btn-outline btn-danger"><i class="ti-close"></i></button>
                      </div>
                    </td>-->
                  </tr>
                  <tr>
                    <td class="" style="background-color: #f0f0f0; height: 130px; width: 22px;">

                        <i class="ti-arrow-right fs-22 text-primary"></i>

                    </td>
                    <td class="text-center col-sm-2">
                      <label class="fs-60" style="color: black">4</label> 
                      <h5 style="color: grey; margin-top: 0" ;>Prev Position: 3</h5>
                      
                    </td>
                    <td class="col-sm-2"><img src="{{asset('/images/products/03.jpg')}}" width="100" alt="" class="img-thumbnail img-responsive"></td>
                    <td class="col-sm-6"><strong style="color: black; font-size: 25px;">Title</strong><p style="font-size: 15px;">Artist/feature</p></td>
                    <td class="text-center col-sm-1"  style="background-color: #f0f0f0"><div>Peak Position</div> <br><strong style="font-size: 20px">3</strong></td>
                    <td  class="text-center col-sm-1" style="background-color: #f0f0f0" >
                    <div>Wks on chart</div>
                    <br>
                    <strong style="font-size: 20px">2</strong></td>
                    <td  class="text-center col-sm-1" style="background-color: #f0f0f0" >
                    <div>Total Airplays</div>
                    <br>
                    <strong style="font-size: 20px">1244</strong></td>
                    
                    <!--<td class="text-center">
                      <div role="group" aria-label="Basic example" class="btn-group btn-group-sm">
                        <a type="button" href="Reports-broadcaster-Qisimah.html" class="btn btn-outline btn-primary"><i class="ti-eye"></i></a>
                        <button type="button" class="btn btn-outline btn-success"><i class="ti-microphone"></i></button>
                        <button type="button" class="btn btn-outline btn-danger"><i class="ti-close"></i></button>
                      </div>
                    </td>-->
                  </tr>

                  <tr>
                    <td class="" style="background-color: #f0f0f0; height: 130px; width: 22px;">

                        <i class="ti-arrow-right fs-22 text-primary"></i>

                    </td>
                    <td class="text-center col-sm-2">
                      <label class="fs-60" style="color: black">5</label> 
                      <h5 style="color: grey; margin-top: 0" ;>Prev Position: 3</h5>
                      
                    </td>
                    <td class="col-sm-2"><img src="{{asset('/images/products/03.jpg')}}" width="100" alt="" class="img-thumbnail img-responsive"></td>
                    <td class="col-sm-6"><strong style="color: black; font-size: 25px;">Title</strong><p style="font-size: 15px;">Artist/feature</p></td>
                    <td class="text-center col-sm-1"  style="background-color: #f0f0f0"><div>Peak Position</div> <br><strong style="font-size: 20px">3</strong></td>
                    <td  class="text-center col-sm-1" style="background-color: #f0f0f0" >
                    <div>Wks on chart</div>
                    <br>
                    <strong style="font-size: 20px">2</strong></td>
                    <td  class="text-center col-sm-1" style="background-color: #f0f0f0" >
                    <div>Total Airplays</div>
                    <br>
                    <strong style="font-size: 20px">1244</strong></td>
                    
                    <!--<td class="text-center">
                      <div role="group" aria-label="Basic example" class="btn-group btn-group-sm">
                        <a type="button" href="Reports-broadcaster-Qisimah.html" class="btn btn-outline btn-primary"><i class="ti-eye"></i></a>
                        <button type="button" class="btn btn-outline btn-success"><i class="ti-microphone"></i></button>
                        <button type="button" class="btn btn-outline btn-danger"><i class="ti-close"></i></button>
                      </div>
                    </td>-->
                  </tr>

                  <tr>
                    <td class="" style="background-color: #f0f0f0; height: 130px; width: 22px;">

                        <i class="ti-arrow-right fs-22 text-primary"></i>

                    </td>
                    <td class="text-center col-sm-2">
                      <label class="fs-60" style="color: black">6</label> 
                      <h5 style="color: grey; margin-top: 0" ;>Prev Position: 3</h5>
                      
                    </td>
                    <td class="col-sm-2"><img src="{{asset('/images/products/03.jpg')}}" width="100" alt="" class="img-thumbnail img-responsive"></td>
                    <td class="col-sm-6"><strong style="color: black; font-size: 25px;">Title</strong><p style="font-size: 15px;">Artist/feature</p></td>
                    <td class="text-center col-sm-1"  style="background-color: #f0f0f0"><div>Peak Position</div> <br><strong style="font-size: 20px">3</strong></td>
                    <td  class="text-center col-sm-1" style="background-color: #f0f0f0" >
                    <div>Wks on chart</div>
                    <br>
                    <strong style="font-size: 20px">2</strong></td>
                    <td  class="text-center col-sm-1" style="background-color: #f0f0f0" >
                    <div>Total Airplays</div>
                    <br>
                    <strong style="font-size: 20px">1244</strong></td>
                    
                    <!--<td class="text-center">
                      <div role="group" aria-label="Basic example" class="btn-group btn-group-sm">
                        <a type="button" href="Reports-broadcaster-Qisimah.html" class="btn btn-outline btn-primary"><i class="ti-eye"></i></a>
                        <button type="button" class="btn btn-outline btn-success"><i class="ti-microphone"></i></button>
                        <button type="button" class="btn btn-outline btn-danger"><i class="ti-close"></i></button>
                      </div>
                    </td>-->
                  </tr>

                  <tr>
                    <td class="" style="background-color: #f0f0f0; height: 130px; width: 22px;">

                        <i class="ti-arrow-right fs-22 text-primary"></i>

                    </td>
                    <td class="text-center col-sm-2">
                      <label class="fs-60" style="color: black">7</label> 
                      <h5 style="color: grey; margin-top: 0" ;>Prev Position: 3</h5>
                      
                    </td>
                    <td class="col-sm-2"><img src="{{asset('/images/products/03.jpg')}}" width="100" alt="" class="img-thumbnail img-responsive"></td>
                    <td class="col-sm-6"><strong style="color: black; font-size: 25px;">Title</strong><p style="font-size: 15px;">Artist/feature</p></td>
                    <td class="text-center col-sm-1"  style="background-color: #f0f0f0"><div>Peak Position</div> <br><strong style="font-size: 20px">3</strong></td>
                    <td  class="text-center col-sm-1" style="background-color: #f0f0f0" >
                    <div>Wks on chart</div>
                    <br>
                    <strong style="font-size: 20px">2</strong></td>
                    <td  class="text-center col-sm-1" style="background-color: #f0f0f0" >
                    <div>Total Airplays</div>
                    <br>
                    <strong style="font-size: 20px">1244</strong></td>
                    
                    <!--<td class="text-center">
                      <div role="group" aria-label="Basic example" class="btn-group btn-group-sm">
                        <a type="button" href="Reports-broadcaster-Qisimah.html" class="btn btn-outline btn-primary"><i class="ti-eye"></i></a>
                        <button type="button" class="btn btn-outline btn-success"><i class="ti-microphone"></i></button>
                        <button type="button" class="btn btn-outline btn-danger"><i class="ti-close"></i></button>
                      </div>
                    </td>-->
                  </tr>
                </tbody>
              </table>
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
