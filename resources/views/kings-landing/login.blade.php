<!DOCTYPE html>
<!--  This site was created in Webflow. http://www.webflow.com  -->
<!--  Last Published: Wed Mar 28 2018 21:05:17 GMT+0000 (UTC)  -->
<html data-wf-page="5ab21e1eeddf7930f1839cd5" data-wf-site="5aadc40aaf9783146823aac3">
<head>
    <meta charset="utf-8">
    <title>Qisimah | login</title>
    <meta content="login" property="og:title">
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
<body>
<div class="login">
    <div class="div-block-20">
        <div class="form-block-2 w-form">
            <form id="qisimah-login-form" name="email-form" data-name="Email Form" data-redirect="qisimah-login-dummy"
                  redirect="qisimah-login-dummy" class="form" action="{{ route('login') }}" method="POST"
                  onsubmit="document.getElementById('submit-login-form').value = 'please wait...'">
                {{ csrf_field() }}
                <a href="#" class="link-block-4 w-inline-block">
                    <img src="{{ asset('kings-landing/images/Qisimah-logo.gif') }}" width="150">
                </a>
                @if(count($errors->all()))
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif
                <label for="username" class="field-label-2">Username:</label>
                <input type="text" class="form-field w-input" maxlength="256" name="email" data-name="username"
                       placeholder="user@email.com" id="username" value="{{ old('email') }}" required>
                <label for="password" class="field-label">Password</label>
                <input type="password" class="form-field w-input" maxlength="256" name="password"
                       data-name="password"
                       placeholder="********" id="password" required="">
                <input type="submit" id="submit-login-form" value="Login" data-wait="Please wait..."
                       class="submit-button w-button">
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
</body>
</html>