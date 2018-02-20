@extends('layouts.master')
@section('title')
    Profile
@endsection
@section('content')
        <div class="page-content container-fluid p-0">
          <div class="row row-0">
            <div class="col-lg-12">
              <div class="overlay-container text-white"><img src="{{asset('images/backgrounds/profile1.png')}}" alt="" class="overlay-bg img-responsive">
                <div style="padding: 120px 30px 30px 30px" class="overlay-content clearfix">
                  <div class="pull-left media">
                    <div class="media-left"><a href="javascript:void(0)" style="display: block; border-radius: 50%; padding: 3px; background-color: #fff;"><img src="{{asset('images/users/Kofi-Kinaata-1.jpg ')}}" width="100" alt="" class="media-object img-circle"></a></div>
                    <div style="width: auto" class="media-body media-middle">
                      <h2 class="media-heading">Kofi Kinaata</h2>
                      <div class="fs-20">Musician</div>
                    </div>
                  </div>
                  <!-- <div class="pull-right text-center">
                    <ul class="list-inline">
                      <li>
                        <div class="fs-24 fw-500">208</div>
                        <p>Total Detections</p>
                      </li>
                      <li>
                        <div class="fs-24 fw-500">560</div>
                        <p>Total Files</p>
                      </li>
                      <li>
                        <div class="fs-24 fw-500">95</div>
                        <p>Countries</p>
                      </li>
                    </ul>
                  <br>
                  <br>
                  <br> -->
                    <!-- <button type="button" class="btn btn-raised btn-block btn-default">Edit</button> -->
                  <!-- </div> -->
                </div>
              </div>
            </div>
          </div>

                <div class="row row-0 p-15 text-center bg-black">
                  <div class="col-xs-3">
                    <div class="fs-20 fw-500">2208</div>
                    <div class="text-muted">Total Air-Plays</div>
                  </div>
                  <div class="col-xs-3">
                    <div class="fs-20 fw-500">60</div>
                    <div class="text-muted">Songs on Qisimah</div>
                  </div>
                  <div class="col-xs-3">
                    <div class="fs-20 fw-500">30</div>
                    <div class="text-muted">Air-play Rank</div>
                  </div>
                  <div class="col-xs-3">
                    <div class="fs-20 fw-500">2</div>
                    <div class="text-muted">Air-Play Countries</div>
                  </div>
                </div>

          <div class="row ml-10 mr-10 pt-10">
            <div class="col-md-3">
              <div class="widget clear">
                <div class="widget-heading">
                  <h3 class="widget-title">About me</h3>
                </div>
                <div class="widget-body">
                  <ul class="media-list mb-0">
                    <li class="media">
                      <div class="media-left"><i class="ti-user text-info"></i></div>
                      <div class="media-body">
                        <p><b>Birth name:</b> Martin King Arthur</p>
                      </div>
                    </li>
                    <li class="media">
                      <div class="media-left"><i class="ti-gift text-info"></i></div>
                      <div class="media-body">
                        <p><b>Born:</b>	Effiakuma - Takoradi, Ghana</p>
                      </div>
                    </li>
                    <li class="media">
                      <div class="media-left"><i class="ti-calendar text-info"></i></div>
                      <div class="media-body">
                        <p><b>Years Active:</b> 2009 - Present</p>
                      </div>
                    </li>
                    <li class="media">
                      <div class="media-left"><i class="ti-music text-info"></i></div>
                      <div class="media-body">
                        <p><b>Genres:</b> Highlife, Hiplife</p>
                      </div>
                    </li>
                    <li class="media">
                      <div class="media-left"><i class="ti-email text-info"></i></div>
                      <div class="media-body">
                        <p><b>Label:</b> High Grade Family</p>
                      </div>
                    </li>
                    <li class="media">
                      <div class="media-left"><i class="ti-email text-info"></i></div>
                      <div class="media-body">
                        <p>highgrade@gmail.com</p>
                      </div>
                    </li>
                    <li class="media">
                      <div class="media-left"><i class="ti-mobile text-info"></i></div>
                      <div class="media-body">
                        <p>(251) 300-2770</p>
                      </div>
                    </li>
                    <li class="media">
                      <div class="media-left"><i class="ti-world text-info"></i></div>
                      <div class="media-body">
                        <p>www.highgrade.com</p>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="widget clear">
                <div class="widget-heading">
                  <h3 class="widget-title">Genre</h3>
                </div>
                <div class="widget-body">
                  <ul class="list-unstyled mb-0">
                    <li>
                      <div class="block clearfix mb-5"><span class="pull-left fs-12">Dance Hall</span><span class="pull-right label label-outline label-primary">4</span></div>
                      <div class="progress progress-xs">
                        <div role="progressbar" data-transitiongoal="4" class="progress-bar"></div>
                      </div>
                    </li>
                    <li>
                      <div class="block clearfix mb-5"><span class="pull-left fs-12">Hip life</span><span class="pull-right label label-outline label-success">38</span></div>
                      <div class="progress progress-xs">
                        <div role="progressbar" data-transitiongoal="38" class="progress-bar progress-bar-success"></div>
                      </div>
                    </li>
                    <li>
                      <div class="block clearfix mb-5"><span class="pull-left fs-12">High life</span><span class="pull-right label label-outline label-purple">45</span></div>
                      <div class="progress progress-xs">
                        <div role="progressbar" data-transitiongoal="45" class="progress-bar progress-bar-purple"></div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <!-- <div class="col-md-6">
              <div class="widget no-border">
                <div style="height: 197px" class="overlay-container overlay-color"><img src="../build/images/backgrounds/34.jpg" alt="" class="overlay-bg img-responsive"></div>
                <div style="position: relative"><a href="#" style="position: absolute; top: -70px; left: 50%; margin-left: -50px; border-radius: 50%; padding: 3px; background-color: #FFF"><img src="../build/images/users/11.jpg" width="100" alt="" class="img-circle"></a></div>
                <div class="text-center p-20 bd-l bd-r">
                  <h4 class="text-primary mt-30 mb-5">Raymond Pierce</h4>
                  <p>Web Developer</p>
                  <p class="mb-0">I am a freelance graphic designer with 20 years experience working in the Graphic Design industry.</p>
                </div>
                <div class="row row-0 p-15 text-center bg-black">
                  <div class="col-xs-4">
                    <div class="fs-20 fw-500">208</div>
                    <div class="text-muted">Total Detections</div>
                  </div>
                  <div class="col-xs-4">
                    <div class="fs-20 fw-500">560</div>
                    <div class="text-muted">Total Files</div>
                  </div>
                  <div class="col-xs-4">
                    <div class="fs-20 fw-500">2</div>
                    <div class="text-muted">Countries</div>
                  </div>
                </div>
              </div>
            </div> -->
            <div class="col-md-6">
              <div class="widget clear">
                <div class="widget-heading">
                  <h3 class="widget-title">Biography</h3>
                </div>
                <div class="widget-body">
                  <p>Martin King Arthur popularly known as Kofi Kinaata is a Ghanaian musician and songwriter from Takoradi. He is noted for his fante rap and freestyle and therefore known as the Fante Rap God </p>
                  <p>Kofi Kinaata was born and raised in Effiakuma, a residential town in the Western Region of Ghana. He completed his secondary education at the Takoradi Technical Institute.</p>
                  <p>Just after High school, Kofi Kinaata was the 1st runner up for the Melody FM Kasahari Battle in 2009. He is noted for his lyrical dexterity in terms of unique rhyme schemes and humorous Fante rap style with a touch of traditional African proverbs in his local language to entertain and educate morally.</p>
                  <p>In December 2015, he released a song "Made In Taadi" which was a jam for most Fante people due to the link to their famous "Ankos" (Fancy dress and Masqueraders Xmas Carnival) annual festival which happens during Christmas.</p>
                </div>
              </div>
                          <!-- <div class="col-md-6"> -->
              <div class="widget clear">
                <div class="widget-heading">
                  <h3 class="widget-title">Top 3 Songs</h3>
                </div>
                <div class="widget-body">
                    <div class="media-left col-xs-12 col-md-4">
                                          <div class="widget">
                                    <div style="height: 100px" class="overlay-container overlay-color"><img src="{{asset('images/charts/Sarkodie-Highest.jpg')}}" alt="" class="overlay-bg img-responsive"></div>
                                    <div style="position: relative"><a href="#" style="position: absolute; top: -70px; left: 50%; margin-left: -50px; border-radius: 50%; padding: 3px; background-color: #FFF"><img src="{{asset('images/charts/Sarkodie-Highest.jpg')}}" width="100" alt="" class="img-circle"></a></div>
                                    <div class="text-center p-20 bd-l bd-r">
                                      <h4 class="widget-title mt-30 mb-5">Title</h4>
                                      <p>Artist/feature</p>
                                    </div>
                                    <div class="row row-0 p-15 text-center bg-black">
                                      <div class="col-xs-12">
                                        <div class="fs-20 fw-500">4</div>
                                        <div class="text-muted">Rank</div>
                                      </div>
                                  </div>
                        </div>
                    </div>

                     <div class="media-left col-xs-12 col-md-4">
                                          <div class="widget">
                                    <div style="height: 100px" class="overlay-container overlay-color"><img src="{{asset('images/charts/Becca.jpg')}}" alt="" class="overlay-bg img-responsive"></div>
                                    <div style="position: relative"><a href="#" style="position: absolute; top: -70px; left: 50%; margin-left: -50px; border-radius: 50%; padding: 3px; background-color: #FFF"><img src="{{asset('images/charts/Becca.jpg')}}" width="100" alt="" class="img-circle"></a></div>
                                    <div class="text-center p-20 bd-l bd-r">
                                      <h4 class="widget-title mt-30 mb-5">Title</h4>
                                      <p>Artist/feature</p>
                                    </div>
                                    <div class="row row-0 p-15 text-center bg-black">
                                      <div class="col-xs-12">
                                        <div class="fs-20 fw-500">20</div>
                                        <div class="text-muted">Rank</div>
                                      </div>
                                  </div>
                        </div>
                    </div>

                    <div class="media-left col-xs-12 col-md-4">
                                          <div class="widget">
                                    <div style="height: 100px" class="overlay-container overlay-color"><img src="{{asset('images/charts/Big-Shaq.jpeg')}}" alt="" class="overlay-bg img-responsive"></div>
                                    <div style="position: relative"><a href="#" style="position: absolute; top: -70px; left: 50%; margin-left: -50px; border-radius: 50%; padding: 3px; background-color: #FFF"><img src="{{asset('images/charts/Big-Shaq.jpeg')}}" width="100" alt="" class="img-circle"></a></div>
                                    <div class="text-center p-20 bd-l bd-r">
                                      <h4 class="widget-title mt-30 mb-5">Title</h4>
                                      <p>Artist/feature</p>
                                    </div>
                                    <div class="row row-0 p-15 text-center bg-black">
                                      <div class="col-xs-12">
                                        <div class="fs-20 fw-500">50</div>
                                        <div class="text-muted">Rank</div>
                                      </div>
                                  </div>
                        </div>
                    </div>                    
                    
                </div>
              </div>
                <!-- </div>   -->
                </div> 
                             
                
            <div class="col-md-3 col-xs-12">
              <div class="widget clear">
                <div class="widget-heading">
                  <h3 class="widget-title">Awards / Nominations</h3>
                </div>
                <div class="widget-body">
                  <ul class="media-list mb-0">
                    <h4 class="media-heading"><b>2017</b></h4>
                    <li class="media"><a href="javascript:;" class="conversation-toggle">
                        <div class="media-left avatar"><img src="" alt="" class="media-object img-circle"><span class="status bg-success"></span></div>
                        <div class="media-body">
                          <h5 class="media-heading">Ghana Music Awards</h5>
                         <p class="text-muted mb-0"><b>Confessions - </b>Songwriter of the Year</p>
                          <p class="text-muted mb-0"><b>Confessions - </b>Highlife song of the Year</p>
                          
                        </div></a></li>
                    <li class="media"><a href="javascript:;" class="conversation-toggle">
                        <div class="media-left avatar"><img src="../build/images/users/20.jpg" alt="" class="media-object img-circle"><span class="status bg-success"></span></div>
                        <div class="media-body">
                          <h5 class="media-heading">Western Music Awards</h5>
                         <p class="text-muted mb-0"><b>Himself - </b>Highlife Artiste of the Year</p>
                          <p class="text-muted mb-0"><b>Himself - </b>Artiste of the Year</p>
                        </div></a></li>
                    <li class="media"><a href="javascript:;" class="conversation-toggle">
                        <div class="media-left avatar"><img src="../build/images/users/11.jpg" alt="" class="media-object img-circle"><span class="status bg-success"></span></div>
                        <div class="media-body">
                          <h5 class="media-heading">Ghana Entertainment Awards</h5>
                         <p class="text-muted mb-0"><b>Himself - </b>Best Highlife Act</p>
                        </div></a></li>
                    <li class="media"><a href="javascript:;" class="conversation-toggle">
                        <div class="media-left avatar"><img src="../build/images/users/06.jpg" alt="" class="media-object img-circle"><span class="status bg-success"></span></div>
                        <div class="media-body">
                          <h5 class="media-heading">Ghana Music Honors</h5>
                         <p class="text-muted mb-0"><b>Himself - </b>Best Hiplife Act</p>
                          
                        </div></a></li>
                      <h4 class="media-heading"><b>2016</b></h4>
                    <li class="media"><a href="javascript:;" class="conversation-toggle">
                        <div class="media-left avatar"><img src="../build/images/users/19.jpg" alt="" class="media-object img-circle"><span class="status bg-success"></span></div>
                        <div class="media-body">
                          <h5 class="media-heading">Ghana Music Awards UK</h5>
                         <p class="text-muted mb-0"><b>Himself - </b>Best New Act</p>
                        </div></a></li>
                    <li class="media"><a href="javascript:;" class="conversation-toggle">
                        <div class="media-left avatar"><img src="../build/images/users/19.jpg" alt="" class="media-object img-circle"><span class="status bg-success"></span></div>
                        <div class="media-body">
                          <h5 class="media-heading">Central Music Awards</h5>
                         <p class="text-muted mb-0"><b>Susuka - </b>Most Popular song in Ghana</p>
                        </div></a></li>
                    <li class="media"><a href="javascript:;" class="conversation-toggle">
                        <div class="media-left avatar"><img src="../build/images/users/19.jpg" alt="" class="media-object img-circle"><span class="status bg-success"></span></div>
                        <div class="media-body">
                          <h5 class="media-heading">Ghana Music Awards</h5>
                         <p class="text-muted mb-0"><b>Himself - </b>Best New Artiste of the Year</p>
                         <p class="text-muted mb-0"><b>Susuka - </b>Writer of the Year</p>
                        </div></a></li>
                    <li class="media"><a href="javascript:;" class="conversation-toggle">
                        <div class="media-left avatar"><img src="../build/images/users/19.jpg" alt="" class="media-object img-circle"><span class="status bg-warning"></span></div>
                        <div class="media-body">
                          <h5 class="media-heading">AFRIMMA Awards</h5>
                         <p class="text-muted mb-0"><b>Himself - </b>New Comer Award</p>
                        </div></a></li>
                    <li class="media"><a href="javascript:;" class="conversation-toggle">
                        <div class="media-left avatar"><img src="../build/images/users/19.jpg" alt="" class="media-object img-circle"><span class="status bg-warning"></span></div>
                        <div class="media-body">
                          <h5 class="media-heading">AELA Awards</h5>
                         <p class="text-muted mb-0"><b>Himself - </b>Fast Rising Artist</p>
                        </div></a></li>
                  </ul>
                </div>
              </div>
              <!-- <div class="widget clear">
                <div class="widget-heading">
                  <h3 class="widget-title">Activities</h3>
                </div>
                <div class="widget-body">
                  <ul class="media-list mb-0">
                    <li class="media">
                      <div class="media-left"><i class="ti-control-record text-info"></i></div>
                      <div class="media-body">
                        <p>Recommended Karen Ortega</p>
                      </div>
                    </li>
                    <li class="media">
                      <div class="media-left"><i class="ti-control-record text-danger"></i></div>
                      <div class="media-body">
                        <p>Retweeted George Lewis</p>
                      </div>
                    </li>
                    <li class="media">
                      <div class="media-left"><i class="ti-control-record text-warning"></i></div>
                      <div class="media-body">
                        <p>Followed Olivia Williamson</p>
                      </div>
                    </li>
                    <li class="media">
                      <div class="media-left"><i class="ti-control-record text-success"></i></div>
                      <div class="media-body">
                        <p>Replied to Janice Davis</p>
                      </div>
                    </li>
                    <li class="media">
                      <div class="media-left"><i class="ti-control-record text-primary"></i></div>
                      <div class="media-body">
                        <p>Favorited Arthur Gomez</p>
                      </div>
                    </li>
                  </ul>
                </div> -->
              </div>
            </div>
          </div>
        </div>
@endsection