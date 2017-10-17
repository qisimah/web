<!DOCTYPE html>
<html>
    <head>

        <!-- /.website title -->
        <title>Qisimah - Audio Insights</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta name="robots" content="index,nofollow">
        <meta name="description" content="Qisimah Audio Insights provide users with real-time analytics on how their contents are performing on radio.">
        <meta name="keywords" content="audio recognition, audio fingerprinting, audio analytics, media monitoring">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- CSS Files -->

        <link rel="icon"
              type="image/png"
              href="{{asset('/images/landing/favicon-32x32.png')}}">
        <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" media="screen">
        <link href="{{asset('css/font-awesome.css')}}" rel="stylesheet">
        <link href="{{asset('fonts/icon-7-stroke/css/pe-icon-7-stroke.css')}}" rel="stylesheet">
        <link href="{{asset('css/animate.css')}}" rel="stylesheet" media="screen">
        <link href="{{asset('css/owl.theme.css')}}" rel="stylesheet">
        <link href="{{asset('css/owl.carousel.css')}}" rel="stylesheet">

        <!-- Colors -->
        <link href="{{asset('css/css-index.css')}}" rel="stylesheet" media="screen">

        <!-- Google Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic" />

    </head>

    <body data-spy="scroll" data-target="#navbar-scroll">

        <!-- /.preloader -->
        <div id="preloader"></div>
        <div id="top"></div>

        <!-- /.parallax full screen background image -->
        <div class="fullscreen landing parallax" style="background-image:url({{asset('images/landing/bg.jpg')}});height: 100vh" data-img-width="2000" data-img-height="1333" data-diff="100">

            <div class="overlay">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">

                            <!-- /.logo -->
                            <div class="logo wow fadeInDown"> <a href=""><img src="{{asset('images/landing/Qisimah-logo-white-small-cropped.png')}}" alt="logo"></a></div>

                            <!-- /.main title -->
                            <h1 class="wow fadeInLeft">
                              Radio is <strong>BIG</strong> Data...   with <strong>BIG</strong> Possibilities...
                            </h1>

                            <!-- /.header paragraph -->
                            <div class="landing-text wow fadeInUp">
                                <p>
                                    <strong style="font-size: 23px; letter-spacing: 1px;">
                                        Monitor your radio Ads & music  in real-time with Qisimah.
                                    </strong>
                                </p>
                            </div>

                            <!-- /.header button -->
                            <div class="head-btn wow fadeInLeft">
                                 <!-- <a href="#feature" class="btn-primary">Join the waiting list</a> -->
                                {{--<a href="{{url('/register')}}" class="btn-default">register</a>--}}
                                <a href="{{url('/login')}}" class="btn-default">let's get started</a>
                            </div>
                        </div>

                        <!-- /.signup form -->
                        <div class="col-md-4">
                            <div class="signup-header wow fadeInUp">
                                <h3 class="form-title text-center">Login</h3>
                                <form class="form-header" action="{{url('/login')}}" role="form" method="POST" id="#">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <input class="form-control input-lg" name="email" id="userEmail" type="email" placeholder="Email" required>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control input-lg" name="password" id="userPassword" type="password" placeholder="Password" required>
                                    </div>
                                    <div class="form-group last">
                                        <input type="submit" id="login" class="btn btn-warning btn-block btn-lg" value="login">
                                    </div>
                                    <p class="privacy text-center"><a href="{{url('/register')}}">Sign Up</a>.</p>
                                </form>
                            </div>

                        </div>
                        <div class="col-sm-12 text-center img-responsive">
                        <img alt="client" src="{{asset('images/landing/client1.png')}}" class="wow fadeInUp">
                    </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- NAVIGATION -->
        <div id="menu">
            <nav class="navbar-wrapper navbar-default" role="navigation">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-backyard">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand site-name" href="#top" style="margin-top: -10px"><img src="{{asset('images/landing/loading.GIF')}}" alt="logo"></a>
                    </div>

                    <div id="navbar-scroll" class="collapse navbar-collapse navbar-backyard navbar-right">
                        <ul class="nav navbar-nav">
                          <li><a href="#top">Home</a></li>
                            <li><a href="{{url('/login')}}">Login</a></li>
                            <li><a href="#intro">About</a></li>
                            <li><a href="#feature">Features</a></li>
                            <li><a href="#package">Packages</a></li>
                            <li><a href="#contact">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>

        <!-- /.intro section -->
        <div id="intro">
            <div class="container">
                <div class="row">

                    <!-- /.intro image -->
                    <!-- <div class="col-md-6 intro-pic wow slideInLeft">
                        <img src="images/intro-image.jpg" alt="image" class="img-responsive">
                    </div> -->

                    <!-- /.intro content -->
                    <div class="col-md-8 col-md-offset-2 wow slideInRight" >
                      <center>
                        <h2>
                            <strong>Qisimah</strong> is a radio content verification platform that allows brands to monitor their campaigns in real-time.
                        </h2>
                        <div class="btn-section">
                            <a href="#feature" class="btn-default">Learn More</a>
                        </div>
                      </center>
                    </div>
                </div>
            </div>
        </div>

        <!-- /.advertiser section -->
        <!-- <div id="download">
            <div class="action fullscreen parallax" style="background-image:url({{asset('images/landing/advertisers.jpg')}});" data-img-width="2000" data-img-height="1333" data-diff="100">
                <div class="overlay">
                    <div class="container">
                        <div class="col-md-8 col-md-offset-2 col-sm-12 text-center"> -->

                            <!-- /.advertiser title -->
                            <!-- <h2 class="wow fadeInRight">Do you Advertise on radio?</h2>
                            <p class="download-text wow fadeInLeft">
                                We make ad monitoring easy for advertisers and marketers by tracking when and where ads are played. Qisimah helps you discover who's listening, determine how to better target your ads and save on ad spends that do not reach the right ear.
                            </p> -->
                            <!-- <p class="download-text wow fadeInLeft">We help marketers and advertisers accurately verify in real-time when their adverts are aired on radio and measure the number of impressions their adverts get simultaneously, across multiple broadcasters.</p> -->

                            <!-- /.download button -->
                            <!-- <div class="download-cta wow fadeInLeft">
                                <a href="{{url('/register')}}" class="btn-secondary">sign up</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

        <!-- /.Musician section -->
        <div id="download">
            <div class="action fullscreen parallax" style="background-image:url({{asset('images/landing/musicianbg.jpg')}});" data-img-width="2000" data-img-height="1333" data-diff="100">
                <div class="overlay">
                    <div class="container">
                        <div class="col-md-8 col-md-offset-2 col-sm-12 text-center">

                            <!-- /.advertiser title -->
                            <h2>Are you a musician?</h2>
                        <p>
                            Get real-time notification on songs played. With our intelligent monitoring system, we are able to tell you who is playing your song, how often they play it and their location.
                        </p>
                        <!-- <p>
                            We help various stakeholders in the music industry to accurately understand broadcast promotion strengths and weaknesses of their musical content.
                        </p> -->
                            <!-- /.download button -->
                            <div class="download-cta wow fadeInLeft">
                                <a href="{{url('/register')}}" class="btn-secondary">sign up</a>
                            </div>
                            <div>
                            <h5>Live Detections</h5>
                <table id="product-list" style="width: 100%" class="table dt-responsive nowrap">
                <thead>
                
                <th></th>
                <th class="text-center">Details</th>
                <th class="text-center">Broadcaster</th>
                <th class="text-center">Location</th>
                <th class="text-center">Time</th>
                </thead>
                <tbody>
                  <tr>
                    <!-- <td class="text-center">
                        <label class="fs-60">1</label> 
                    </td> -->
                    <td class=""><img src="../build/images/products/01.jpg" width="100" alt="" class="img-thumbnail img-responsive"></td>
                    <td><strong>Title</strong><p>Artist</p></td>
                    
                    <td class="text-center">Live 91.9fm</td>

                    <td class="text-center">Accra, Ghana</td>

                    <td class="text-center">12:32:06</td>
                  </tr>
                  <tr>
                    <!-- <td class="text-center">
                      <label class="fs-60">2</label> 
                    </td> -->
                    <td class=""><img src="../build/images/products/02.jpg" width="100" alt="" class="img-thumbnail img-responsive"></td>
                    <td><strong>Title</strong><p>Artist</p></td>
                    <td class="text-center">Live 91.9fm</td>                    
                    <td class="text-center">Johanesburg, South Africa</td>
                    <td class="text-center">12:31:06</td>
                  </tr>
                  <tr>
                    <!-- <td class="text-center">
                      <label class="fs-60">3</label> 
                      </div>
                    </td> -->
                    <td class=""><img src="../build/images/products/02.jpg" width="100" alt="" class="img-thumbnail img-responsive"></td>
                    <td><strong>Title</strong><p>Artist</p></td>
                    <td class="text-center">Live 91.9fm</td>                    
                    <td class="text-center">Johanesburg, South Africa</td>
                    <td class="text-center">12:30:06</td>
                  </tr>
                </tbody>
              </table>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- /.artist 2 section -->
        <div id="feature-2">
            <div class="container">
                <div class="row">
                    <!-- /.feature image -->
                    <div class="col-md-5 feature-2-pic wow fadeInLeft">
                        <img src="{{asset('images/landing/mic1.jpg')}}" alt="microphone" class="img-responsive" width="70%">
                    </div>

                    <!-- /.advertiser title -->
                            <h2 class="wow fadeInRight">Do you Advertise on radio?</h2>
                            <p class="download-text wow fadeInLeft">
                                We make ad monitoring easy for advertisers and marketers by tracking when and where ads are played. Qisimah helps you discover who's listening, determine how to better target your ads and save on ad spends that do not reach the right ear.
                            </p>
                            <p class="download-text wow fadeInLeft">We help marketers and advertisers accurately verify in real-time when their adverts are aired on radio and measure the number of impressions their adverts get simultaneously, across multiple broadcasters.</p>

                            <!-- /.download button -->
                            <div class="download-cta wow fadeInLeft"> 
                                <a href="{{url('/register')}}" class="btn-secondary">Get Notified When Available</a>
                        </div>

                    </div>
                </div>

            </div> 
            
        </div>

        <!-- /.radio_station section -->
        <div id="download">
            <div class="action fullscreen parallax" style="background-image:url({{asset('images/landing/wave.jpg')}});" data-img-width="2000" data-img-height="1333" data-diff="100">
                <div class="overlay">
                    <div class="container">
                        <div class="col-md-8 col-md-offset-2 col-sm-12 text-center">

                            <!-- /.radio_station title -->
                            <h2 class="wow fadeInRight">Are you a radio station?</h2>
                            <p class="download-text wow fadeInLeft">
                                Deliver your internet radio stream to any device, anywhere, with ease with Qisimah Hosting. Expand your reach beyond the capabilities of your antenna tower and reach millions of potential listeners worldwide.
                            </p>
                            <!-- <p class="download-text wow fadeInLeft">We help marketers and advertisers accurately verify in real-time when their adverts are aired on radio and measure the number of impressions their adverts get simultaneously, across multiple broadcasters.</p> -->

                            <!-- /.radio_station button -->
                            <div class="download-cta wow fadeInLeft">
                                <a href="{{url('/register')}}" class="btn-secondary">Join Our Stream List</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- /.feature section -->
        <div id="feature">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1 col-sm-12 text-center feature-title">

                        <!-- /.feature title -->
                        <h2>Monitor your Ads and music on radio and gain more insights</h2>
                        <!-- <p>Get ROI on radio Ads and music.</p> -->
                    </div>
                </div>
                <div class="row row-feat">
                    <div class="col-md-4 text-center">

                        <!-- /.feature image -->
                        <!-- <div class="feature-2-pic">
                            <img src="images/Quisimah-screen-small.png" alt="image" class="img-responsive wow fadeInLeft">
                        </div> -->
                    </div>

                    <div class="col-md-12">

                        <!-- /.feature 1 -->
                        <div class="col-sm-3 feat-list">
                            <div><img class="pe-5x pe-va wow fadeInUp" src="{{asset('images/landing/1.png')}}"/></div>
                            <!--<i class="pe-7s-upload pe-5x pe-va wow fadeInUp"></i>-->
                            <div class="inner">
                                <h4>Content Upload</h4>
                                <p>Upload your content to Qisimah's database to start monitoring.
                                </p>
                            </div>
                        </div>

                        <!-- /.feature 2 -->
                        <div class="col-sm-3 feat-list">
                            <div><img class="pe-5x pe-va wow fadeInUp" data-wow-delay="0.2s" src="{{asset('images/landing/2.png')}}"/></div>
                            <!--<i class="pe-7s-micro pe-5x pe-va wow fadeInUp" data-wow-delay="0.2s"></i>-->
                            <div class="inner">
                                <h4>Broadcast Monitoring</h4>
                                <p>Select the broadcasters which you would like to monitor.</p>
                            </div>
                        </div>

                        <!-- /.feature 3 -->
                        <div class="col-sm-3 feat-list">
                            <div><img class="pe-5x pe-va wow fadeInUp" data-wow-delay="0.4s" src="{{asset('images/landing/3.png')}}"/></div>
                            <!--<i class="pe-7s-bell pe-5x pe-va wow fadeInUp" data-wow-delay="0.4s"></i>-->
                            <div class="inner">
                                <h4>Real-time Notifications</h4>
                                <p>Get real-time notification when your content is aired.</p>
                            </div>
                        </div>

                        <!-- /.feature 4 -->
                        <div class="col-sm-3 feat-list">
                            <div><img class="pe-5x pe-va wow fadeInUp" data-wow-delay="0.6s" src="{{asset('images/landing/4.png')}}"/></div>
                            <!--<i class="pe-7s-graph2 pe-5x pe-va wow fadeInUp" data-wow-delay="0.6s"></i>-->
                            <div class="inner">
                                <h4>Broadcast Reports</h4>
                                <p>Receive broadcaster statistics and analytics on content uploaded.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- /.download section -->
        <div id="download">
            <div class="action fullscreen parallax" style="background-image:url({{asset('images/landing/bg.jpg')}});" data-img-width="2000" data-img-height="1333" data-diff="100">
                <div class="overlay">
                    <div class="container">
                        <div class="col-md-8 col-md-offset-2 col-sm-12 text-center">

                            <!-- /.download title -->
                            <h2 class="wow fadeInRight">Would like to know more?</h2>
                            <p class="download-text wow fadeInLeft">Good marketing makes the company look smart. Great marketing makes the customer feel smart.</p>

                            <!-- /.download button -->
                            <div class="download-cta wow fadeInLeft">
                                <a href="{{url('/register')}}" class="btn-default">Sign Up</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- /.pricing section -->
        <div id="package">
            <div class="container">
                <div class="text-center">

                    <!-- /.pricing title -->
                    <h2 class="wow fadeInLeft">Packages</h2>
                    <div class="title-line wow fadeInRight"></div>
                </div>
                <div class="row package-option">

                    <!-- /.package 1 -->
                    <div class="col-sm-4">
                        <div class="price-box wow fadeInUp">
                            <div class="price-heading text-center">

                                <!-- /.package icon -->
                                <i class="pe-7s-music pe-5x"></i>

                                <!-- /.package name -->
                                <h3>Music</h3>
                            </div>

                            <!-- /.price -->
                             <!-- <div class="price-group text-center">
                                <span class="dollar">$</span>
                                <span class="price">50</span>
                                <span class="time">/mo</span>
                            </div>  -->

                            <!-- /.package features -->
                            <ul class="price-feature text-center">
                                <li>Unlimited Song Upload</li>
                                <li>1 Personal Account</li>
                                <li>Broadcast Monitoring in 1 country</li>
                                <li>Realtime Notifications</li>
                                <li>Broadcaster Statistics</li>
                                <li>Analytics</li>
                                <br>
                                <br>
                                <br>
                                <br>
                            </ul>

                            <!-- /.package button -->
                            <div class="price-footer text-center">
                                <a class="btn btn-price" >Contact Us</a>
                            </div>
                        </div>
                    </div>
                   
                    <!-- /.package 2 -->
                    <div class="col-sm-4">
                        <div class="price-box wow fadeInUp" data-wow-delay="0.4s">
                            <div class="price-heading text-center">

                                <!-- /.package icon -->
                                <i class="pe-7s-signal pe-5x"></i>

                                <!-- /.package name -->
                                <h3>Stream Hosting</h3>
                            </div>

                            <!-- /.price -->
                             <!-- <div class="price-group text-center">
                                <span class="dollar">$</span>
                                <span class="price">50</span>
                                <span class="time">/mo</span>
                            </div>  -->

                            <!-- /.package features -->
                            <ul class="price-feature text-center">
                                <li>Conversion of traditional frequency online</li>
                                <li>99% Up-Time</li>
                                <li>Stream Monitoring</li>
                                <li>Broadcast Statistics</li>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <!--<li>Analytics</li>-->
                                <!--<li>Head-to-Head song comparison </li>-->
                            </ul>

                            <!-- /.package button -->
                            <div class="price-footer text-center">
                                <a class="btn btn-price" >Contact Us</a>
                            </div>
                        </div>
                    </div> 

                     <!-- /.package 3 -->
                    <div class="col-sm-4">
                        <div class="price-box wow fadeInUp" data-wow-delay="0.4s">
                            <div class="price-heading text-center">

                                <!-- /.package icon -->
                                <i class="pe-7s-portfolio pe-5x"></i>

                                <!-- /.package name -->
                                <h3>Enterprise</h3>
                            </div>

                            <!-- /.price -->
                             <!-- <div class="price-group text-center">
                    
                                <span class="price">&mdash;</span>
                            
                            </div>  -->

                            <!-- /.package features -->
                            <ul class="price-feature text-center">
                                <li>Unlimited Song Upload</li>
                                <li>Multiple Artists</li>
                                <li>Broadcast Monitoring (Multiple Countries)</li>
                                <li>Realtime Notifications</li>
                                <li>Broadcaster Statistics</li>
                                <li>Analytics</li>
                                <li>Head-to-Head song comparison </li>
                            </ul>

                            <!-- /.package button -->
                            <div class="price-footer text-center">
                                <a class="btn btn-price" >Contact Us</a>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </div>
        <div id="contact">
            <div class="contact fullscreen parallax" style="background-image:url({{asset('images/landing/bg.jpg')}});" data-img-width="2000" data-img-height="1334" data-diff="100">
                <div class="overlay">
                    <div class="container">
                        <div class="row contact-row">
                            <!-- /.address and contact -->
                            <div class="col-sm-5 contact-left wow fadeInUp">
                                <h2><span class="highlight">Get</span> in touch</h2>
                                <ul class="ul-address">
                                    <li><i class="pe-7s-map-marker"></i>No. 20, Aluguintugui St, East Legon</br>
                                        Accra, Ghana.
                                    </li>
                                    <li><i class="pe-7s-phone"></i>+233 50 723 0806</br>
                                        +233 50 118 6903
                                    </li>
                                    <li><i class="pe-7s-mail"></i><a href="mailto:qisimah@gmail.com">info@qisimah.com</a></li>
                                    <li><i class="pe-7s-look"></i><a href="#">www.qisimah.com</a></li>
                                </ul>
                            </div>

                            <!-- /.contact form -->
                            <h2 class="wow fadeInRight"></h2>
                            <div class="col-sm-7 contact-right">
                                <form method="POST" id="contact-form" class="form-horizontal" action="{{route('contact.store')}}" onSubmit="alert( 'Thank you for your feedback!' );">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <input id="fullName" name="name" type="text" class="form-control wow fadeInUp validate" placeholder="Name" required/>
                                    </div>
                                    <div class="form-group">
                                        <input id="telephone" name="telephone" type="telephone" class="form-control wow fadeInUp validate" placeholder="Telephone" required/>
                                    </div>
                                    <div class="form-group">
                                        <input id="emailAdd" name="email" type="email" class="form-control wow fadeInUp validate" placeholder="Email" required/>
                                    </div>
                                    <div class="form-group">
                                        <input id="location" name="location" type="text" class="form-control wow fadeInUp" placeholder="Location" required/>
                                    </div>
                                    <div class="form-group">
                                        <textarea id="message" name="message" rows="20" cols="20" class="form-control input-message wow fadeInUp validate"  placeholder="message" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <input id="submit" name="submit" type="submit" value="Submit" class="btn btn-success wow fadeInUp" />
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- /.footer -->
        <footer id="footer">
            <div class="container">
                <div class="col-sm-4 col-md-6 col-md-offset-3 col-sm-offset-4">
                    <!-- /.social links -->
                    <div class="social text-center">
                        <ul>
                            <li><a class="wow fadeInUp" href="https://twitter.com/qisimah/"><i class="fa fa-twitter"></i></a></li>
                            <li><a class="wow fadeInUp" href="https://www.facebook.com/Qisimah/" data-wow-delay="0.2s"><i class="fa fa-facebook"></i></a></li>
                            <!-- <li><a class="wow fadeInUp" href="https://plus.google.com/" data-wow-delay="0.4s"><i class="fa fa-google-plus"></i></a></li> -->
                            <li><a class="wow fadeInUp" href="https://instagram.com/qisimah_world/" data-wow-delay="0.6s"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>
                    <div class="text-center wow fadeInUp">
                        <p><a href="https://www.acrcloud.com" target="_blank">Broadcast Monitoring Powered by: <img width="18%" src="{{asset('images/landing/ACRCloud-logo.png')}}"></a></p>
                    </div>
                    <div class="text-center wow fadeInUp" style="font-size: 14px;">Copyright  <a href="https://qisimah.com/" target="_blank">Qisimah 2017</a></div>
                    <a href="#" class="scrollToTop"><i class="pe-7s-up-arrow pe-va"></i></a>
                </div>
            </div>
        </footer>

        <!-- /.javascript files -->
        <script src="{{asset('js/jquery.js')}}"></script>
        <script src="{{asset('js/scrollspy.js')}}"></script>
        <script src="{{asset('js/bootstrap.min.js')}}"></script>
        <script src="{{asset('js/custom.js')}}"></script>
        <script src="{{asset('js/jquery.sticky.js')}}"></script>
        <script src="{{asset('js/wow.min.js')}}"></script>
        <script src="{{asset('js/owl.carousel.min.js')}}"></script>
        <script>
            new WOW().init();

            $(document).ready(function () {
                // Submit enquiry
                $('#submit').on('click', function (e) {
                    e.preventDefault();
                    $(this).parent('div').siblings('div').find('label').remove();
                    $(this).val('please wait...');
                    $(this).prop('disable', true);

                    var contact = {};
                    contact._token      = $('meta[name="csrf-token"]').attr('content');
                    contact.fullName    = $('#fullName').val();
                    contact.emailAdd    = $('#emailAdd').val();
                    contact.telephone   = $('#telephone').val();
                    contact.location    = $('#location').val();
                    contact.message     = $('#message').val();

                    console.log(contact);

                    $.post('/contact', contact).done(function (data) {
                        $('#contact-form').html('<h4 class="has-success">'+data.description+'</h4>')
                    }).error(function (error) {
                        if (error.status === 422){
                            var message = $.parseJSON(error.responseText);
                            for (var key in message){
                                $('#'+key).parent('div').prepend('<label class="has-warning">'+message[key]+'</label>');
                            }
                        } else {
                            alert('Something went wrong, please refresh the page and try again!');
                        }
                        $('#submit').val('submit').prop('disabled', false);
                    });
                });
                //
                // User Login
                $('#login').on('click', function (e) {
                    $(this).val('please wait...');
                    $(this).parent('div').siblings('div').find('label').remove();
                    e.preventDefault();

                    var user = {};
                    user._token         = $('meta[name="csrf-token"]').attr('content');
                    user.userEmail      = $('#userEmail').val();
                    user.userPassword   = $('#userPassword').val();

                    $.post('/login', user).done(function (data) {
                        window.location.href = '/';
                    }).error(function (error) {
                        if(error.status === 422){
                            var message = $.parseJSON(error.responseText);
                            for (var key in message){
                                $('#'+key).parent('div').prepend('<label class="has-warning">'+message[key]+'</label>');
                            }
                        } else {
                            alert('Something went wrong, please refresh the page and try again!');
                        }
                        $('#login').val('login');
                    });
                });
                //
            });
        </script>
    </body>
</html>
