<!DOCTYPE html>
<!--  This site was created in Webflow. http://www.webflow.com  -->
<!--  Last Published: Wed Mar 28 2018 21:05:17 GMT+0000 (UTC)  -->
<html data-wf-page="5aadc40baf9783213523aaef" data-wf-site="5aadc40aaf9783146823aac3">
<head>
    <meta charset="utf-8">
    <title>Qisimah | @yield('title') </title>
    <meta content="Qisimah | Real-time Audio Monitoring and Insights" property="og:title">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="Webflow" name="generator">
    <link href="{{ asset('kings-landing/css/normalize.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('kings-landing/css/webflow.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('kings-landing/css/qisimah-sub.webflow.css') }}" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.4.7/webfont.js" type="text/javascript"></script>
    <script type="text/javascript">WebFont.load({google: {families: ["Karla:regular,italic,700,700italic"]}});</script>
    <!-- [if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"
            type="text/javascript"></script><![endif] -->
    <script type="text/javascript">!function (o, c) {
            var n = c.documentElement, t = " w-mod-";
            n.className += t + "js", ("ontouchstart" in o || o.DocumentTouch && c instanceof DocumentTouch) && (n.className += t + "touch")
        }(window, document);</script>
    <link href="{{ asset('kings-landing/images/favicon.gif') }}" rel="shortcut icon" type="image/x-icon">
    <link href="{{ asset('kings-landing/images/webclip.png') }}" rel="apple-touch-icon">
</head>
<body class="body-b">

<div class="form-modal">
    <div class="div-block-24"><a href="#" class="form-modal-close w-inline-block" data-ix="form-modal-close"><img
                    src="{{ asset('kings-landing/images/close-icon.svg') }}" width="17.5"></a>
        <div class="form-block-3 w-form">
            <form id="qisimah-verification-form" name="email-form" data-name="Email Form" action="{{ route('contact.store') }}" method="POST">
                {{ csrf_field() }}
                <label for="name" class="verify-form-label">Name:</label>
                <input type="text" class="form-field w-input"
                       maxlength="256" name="name"
                       data-name="Name"
                       placeholder="Enter your name" id="name" value="{{ old('name') }}" required>
                <label for="user-type" class="verify-form-label">User type:</label>
                <select id="user-type"
                        name="user_type"
                        data-name="User Type"
                        class="form-field w-select">
                    <option value="">Select one...</option>
                    <option value="Recording Artist">Recording Artist</option>
                    <option value="Record Label / Company">Record Label / Company</option>
                    <option value="Advertiser">Advertiser</option>
                    <option value="Royalties Collection">Royalties Collection</option>
                </select>
                <label for="phone" class="verify-form-label">Phone Number</label>
                <input type="text"
                       class="form-field w-input"
                       maxlength="256"
                       name="telephone"
                       data-name="Phone"
                       placeholder="Kindly provide a number"
                       id="phone" required>
                <label
                        for="email" class="verify-form-label">Email Address:</label>
                <input type="email"
                       class="form-field w-input"
                       maxlength="256" name="email"
                       data-name="Email"
                       placeholder="Enter your email"
                       id="email" required>
                <input
                        type="submit" value="Submit" data-wait="Please wait..." class="submit-button-2 w-button">
            </form>
            <div class="w-form-done">
                <div>Thank you! Your submission has been received!</div>
            </div>
            <div class="w-form-fail">
                <div>Oops! Something went wrong while submitting the form.</div>
            </div>
        </div>
    </div>
</div>
<div class="w-embed w-iframe">
    <!--  Google Tag Manager (noscript)  -->
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-52B53N9" height="0" width="0"
                style="display:none;visibility:hidden"></iframe>
    </noscript>
    <!--  End Google Tag Manager (noscript)  -->
    <div class="fb-customerchat" page_id="190832718139853" ref="website chatbot"></div>
</div>
<div data-collapse="small" data-animation="default" data-duration="400" class="navbar w-nav">
    <a href="#"
       class="w-nav-brand"><img
                src="{{ asset('kings-landing/images/Qisimah-logo.gif') }}" width="150"></a>
    <nav role="navigation" class="nav-menu w-nav-menu">
        <a href="{{ url('welcome') }}" class="nav-link w-nav-link">Home</a>
        <a href="{{ url('about.us') }}" class="nav-link w-nav-link">About</a>
        <a href="{{ url('new#how-it-works') }}" class="nav-link w-nav-link">How it works</a>
        <a href="{{ url('charts') }}" class="nav-link w-nav-link">Charts</a>
        <a href="{{ url('contact.us') }}" class="nav-link w-nav-link">Contact</a>
        <a href="{{ url('log.in') }}" class="button w-button">LOGIN</a>
    </nav>
    <div class="menu-button w-nav-button">
        <div class="w-icon-nav-menu"></div>
    </div>
</div>


{{-- get verified section is included on selected pages--}}

{{--Insert page specific section here--}}
@yield('after-get-verified')
{{--end page specific insertiong--}}


<div class="trial">
    <div class="div-block-7">
        <h5 class="heading-3">04.</h5>
        <h5 class="heading-3">PACKAGES</h5>
    </div>
    <div class="w-row">
        <div class="w-col w-col-6">
            <h1 class="heading packagess" data-ix="fadebounce">Qisimah is available in four flexible packages.</h1>
            <h5 class="heading-3 payabe">*payable monthly</h5>
        </div>
        <div class="w-col w-col-6">
            <div class="row-5 w-row">
                <div class="column-4 w-col w-col-6">
                    <div class="text-block-3" data-ix="fadebounce">Basic</div>
                </div>
                <div class="w-col w-col-6">
                    <div class="text-block-3 standard" data-ix="fadebounce">Standard</div>
                </div>
            </div>
            <div class="w-row">
                <div class="column-4 w-col w-col-6">
                    <div class="text-block-3 premium" data-ix="fadebounce">Premium</div>
                </div>
                <div class="w-col w-col-6">
                    <div class="text-block-3 enterprise" data-ix="fadebounce">Enterprise</div>
                </div>
            </div>
            <a href="#" class="cta-hero-button reverse-button buttom w-button" data-ix="fadebounce">Try now</a></div>
    </div>
</div>
<div id="footer" class="footer">
    <div class="div-block-25">
        <div>
            <div class="w-row">
                <div class="column-6 w-col w-col-6"><img
                            src="{{ asset('kings-landing/images/Qisimah-winning-white.png') }}" width="180"
                            srcset="{{ asset('kings-landing/images/Qisimah-winning-white-p-500.png') }} 500w, {{ asset('kings-landing/images/Qisimah-winning-white-p-800.png') }} 800w, {{ asset('kings-landing/images/Qisimah-winning-white-p-1080.png') }} 1080w, {{ asset('kings-landing/images/Qisimah-winning-white.png') }} 1127w"
                            sizes="(max-width: 479px) 57vw, 180px"></div>
                <div class="w-col w-col-6"></div>
            </div>
        </div>
        <div class="row-6 w-row">
            <div class="column-5 w-col w-col-3"><a href="https://www.facebook.com/Qisimah/" target="_blank"
                                                   class="social-icn w-inline-block"></a><a
                        href="https://twitter.com/qisimah" target="_blank"
                        class="social-icn twitter w-inline-block"></a><a
                        href="https://www.linkedin.com/company/qisimah/" target="_blank"
                        class="social-icn linkedin w-inline-block"></a><a
                        href="https://www.linkedin.com/company/qisimah/" target="_blank"
                        class="social-icn instagram w-inline-block"></a></div>
            <div class="w-col w-col-3"></div>
            <div class="w-col w-col-3"></div>
            <div class="w-col w-col-3"></div>
        </div>
        <div class="div-block-17">
            <div>
                <div class="text-block-4">©2018 Qisimah. All Rights Reserved.</div>
            </div>
            <div class="div-block-18">
                <div>Broadcast Monitoring Powered by:</div>
                <img src="{{ asset('kings-landing/images/acrcloud-logo.png') }}" width="100" class="image-6"></div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" type="text/javascript"
        intergrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="{{ asset('kings-landing/js/webflow.js') }}" type="text/javascript"></script>
<!-- [if lte IE 9]>
<script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
<!--  Global site tag (gtag.js) - Google Analytics  -->
<script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-109589703-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }

    gtag('js', new Date());
    gtag('config', 'UA-109589703-1');
    gtag('set', {'user_id': 'USER_ID'}); // Set the user ID using signed-in user_id.
    gtag('set', 'userId', 'USER_ID'); // Set the user ID using signed-in user_id.
</script>
<script src="https://mattboldt.com/demos/typed-js/js/typed.custom.js"></script>
<script>
    $(function () {
        $("#typed").typed({
            strings: ["with Qisimah", "wherever", "whenever!"],
            typeSpeed: 50,
            startDelay: 1000,
            backSpeed: 200,
            backDelay: 4000,
            loop: true,
            loopCount: Infinity,
            /*callback: function(){
              shift();
            }*/
        });
    });
</script>
</body>
</html>