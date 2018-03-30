@extends('kings-landing.base')
@section('title')
    Contact Us
@endsection
<body>
<div class="header-cont">
    <div class="contact-page-hero">
        <div class="header-content">
            <h2 class="heading-7">Contact us to learn more about Qisimah</h2>
        </div>
    </div>
</div>
<div id="contact-form" class="register-verify">
    <div class="div-block-7">
        <h5 class="heading-3">01.</h5>
        <h5 class="heading-3">GET VERIFIED</h5>
    </div>
    <div class="w-row">
        <div class="w-col w-col-4 w-col-stack">
            <h1 class="verify" data-ix="fadebounce">Are you a musician?</h1>
            <p class="paragraph-8">Get verified to see Qisimah in action <br>- free for a limited period.</p>
        </div>
        <div class="w-col w-col-8 w-col-stack">
            @if(count($errors->all()))
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <p style="color: white">{{ $error }}</p><br>
                    @endforeach
                </div>
            @endif
            <div class="form-block-3 w-form">
                @if(session()->has('success'))
                    @if(session('success'))
                        <div class="" style="color: white">
                            <div>Thank you! Your submission has been received! For fast response, either call our
                                numbers or click the let's talk button on the home page to chat on whatsapp!
                            </div>
                        </div>
                    @else
                        <div class="" style="color: white">
                            <div>Oops! Something went wrong while submitting the form.</div>
                        </div>
                    @endif
                @else
                    <form id="qisimah-verification-form" name="email-form" data-name="Email Form"
                          action="{{ route('contact.store') }}" method="POST">
                        {{ csrf_field() }}
                        <label for="name" class="verify-form-label">Name:</label>
                        <input type="text" class="form-field w-input" maxlength="256" name="name" data-name="Name"
                               placeholder="first and last names" id="name" value="{{ old('name') }}">
                        <label for="user-type" class="verify-form-label">User type:</label>
                        <select id="user-type" name="user_type" data-name="user type" class="form-field w-select">
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
                               data-name="phone"
                               placeholder="Kindly provide a number"
                               id="phone"
                               value="{{ old('telephone') }}"
                               required>
                        <label for="email-4" class="verify-form-label">Email Address:</label>
                        <input type="email"
                               class="form-field w-input"
                               maxlength="256"
                               name="email"
                               data-name="email"
                               placeholder="Enter your email"
                               id="email-4"
                               value="{{ old('email') }}"
                               required>
                        <input type="submit" value="Submit" data-wait="Please wait..." class="submit-button-2 w-button">
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>
<div class="section-5">
    <div class="div-block-7">
        <h5 class="heading-3">02.</h5>
        <h5 class="heading-3">LOCATION</h5>
    </div>
    <div class="w-row">
        <div class="w-col w-col-4 w-col-small-small-stack"></div>
        <div class="w-col w-col-4 w-col-small-small-stack">
            <p class="paragraph-6">19 Banana Street
                <br>Ambassadorial Enclave
                <br>East Legon Accra, <br>Ghana</p><a
                    href="https://www.google.com.gh/maps/place/Dropifi+Inc./@5.6444455,-0.1538623,17z/data=!3m1!4b1!4m5!3m4!1s0xfdf9b550b2ea9f7:0x54152149331c44d1!8m2!3d5.6444402!4d-0.1516736?hl=en"
                    target="_blank" class="see-on-map w-inline-block">
                <img src="{{ asset('kings-landing/images/maps-and-flags.svg') }}" width="25" class="image-7">
                <p class="paragraph-6 _4">View on map</p></a></div>
        <div class="w-col w-col-4 w-col-small-small-stack">
            <p class="paragraph-5">+233 50 723 0806</p>
            <p>+233 24 966 3326</p>
        </div>
    </div>
</div>
</body>