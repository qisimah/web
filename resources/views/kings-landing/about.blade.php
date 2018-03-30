@extends('kings-landing.base')
@section('title')
    About Us
@endsection
<body class="body-2">
<div class="form-modal">
    <div class="div-block-24"><a href="#" class="form-modal-close w-inline-block" data-ix="form-modal-close">
            <img src="images/close-icon.svg" width="17.5"></a>
        <div class="form-block-3 w-form">
            <form id="qisimah-verification-form" name="email-form" data-name="Email Form" action="http://qisimahmail">
                <label for="name" class="verify-form-label">Name:</label><input type="text" class="form-field w-input"
                                                                                maxlength="256" name="name"
                                                                                data-name="Name"
                                                                                placeholder="Enter your name" id="name"><label
                        for="user-type" class="verify-form-label">User type:</label><select id="user-type"
                                                                                            name="user-type"
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
                       name="phone"
                       data-name="Phone"
                       placeholder="Kindly provide a number"
                       id="phone" required="">
                <label
                        for="email" class="verify-form-label">Email Address:</label>
                <input type="email"
                       class="form-field w-input"
                       maxlength="256" name="email"
                       data-name="Email"
                       placeholder="Enter your email"
                       id="email" required="">
                <input type="submit" value="Submit" data-wait="Please wait..." class="submit-button-2 w-button">
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
<div class="section-3">
    <div class="div-block-13">
        <div class="div-block-7">
            <h5 class="heading-3">01.</h5>
            <h5 class="heading-3">ABOUT US</h5>
        </div>
        <h1 class="heading altd">The Qisimah Story</h1>
        <p class="about-paragraph">Like people, we believe audio music files leave behind a rich trail of both digital
            and offline breadcrumbs which if processed effectively can uncover patterns and insights that can help
            various stakeholders in the music industry make more prudent decisions.<br><br>We are a music consumption
            data company that strives to assist our customers to appreciate their music, audiences and the markets which
            they operate in by providing meaning to their radio airplay data.</p>
    </div>
</div>
<div class="advisors">
    <div class="div-block-7">
        <h5 class="heading-3 whittess">02.</h5>
        <h5 class="heading-3 whittess">ADVISERS</h5>
    </div>
    <h1 class="heading altd whhites">We are backed by the finest brains in business and music.</h1>
    <div class="row-3 w-row">
        <div class="advisor-column w-col w-col-4">
            <a href="#" class="link-block-2 w-inline-block">
                <img src="{{ asset('kings-landing/images/8.png') }}" class="image-3">
                <div class="div-block-14">
                    <h4 class="heading-5">Jorn Lyseggen</h4>
                    <p class="paragraph-4">Meltwater Outside Insight</p>
                </div>
            </a>
        </div>
        <div class="advisor-column w-col w-col-4">
            <a href="#" class="link-block-2 w-inline-block">
                <img src="{{ asset('kings-landing/images/5.png') }}" srcset="{{ asset('kings-landing/images/5-p-500.png') }} 500w, {{ asset('kings-landing/images/5.png') }} 650w"
                     sizes="(max-width: 479px) 88vw, (max-width: 767px) 87vw, (max-width: 991px) 29vw, 32vw"
                     class="image-3">
                <div class="div-block-14">
                    <h4 class="heading-5">Colin Gayle</h4>
                    <p class="paragraph-4">CEO - ACA</p>
                </div>
            </a>
        </div>
        <div class="advisor-column w-col w-col-4">
            <a href="#" class="link-block-2 w-inline-block">
                <img src="{{ asset('kings-landing/images/2.png') }}" class="image-3">
                <div class="div-block-14">
                    <h4 class="heading-5">Naima Mclean</h4>
                    <p class="paragraph-4">Project Manager - ACA South Africa</p>
                </div>
            </a>
        </div>
    </div>
    <div class="row-4 w-row">
        <div class="advisor-column w-col w-col-4">
            <a href="#" class="link-block-2 w-inline-block">
                <img src="{{ asset('kings-landing/images/7.png') }}" class="image-3">
                <div class="div-block-14">
                    <h4 class="heading-5">Aaron Fu</h4>
                    <p class="paragraph-4">Managing Director - MEST</p>
                </div>
            </a>
        </div>
        <div class="advisor-column w-col w-col-4">
            <a href="#" class="link-block-2 w-inline-block">
                <img src="{{ asset('kings-landing/images/4.png') }}" class="image-3">
                <div class="div-block-14">
                    <h4 class="heading-5">Roger L. Patton</h4>
                    <p class="paragraph-4">ACA</p>
                </div>
            </a>
        </div>
        <div class="advisor-column w-col w-col-4">
            <a href="#" class="link-block-2 w-inline-block">
                <img src="{{ asset('kings-landing/images/3.png') }}" class="image-3">
                <div class="div-block-14">
                    <h4 class="heading-5">Yvette Gayle</h4>
                    <p class="paragraph-4">Executive VP of Communication - ACA</p>
                </div>
            </a>
        </div>
    </div>
</div>

@include('kings-landing.get-verified')

<div class="section-4">
    <div class="div-block-7">
        <h5 class="heading-3">03.</h5>
        <h5 class="heading-3">PARTNERS</h5>
    </div>
    <div class="row-2 w-row">
        <div class="column w-col w-col-4"><img src="{{ asset('kings-landing/images/mest-logo.png') }}" width="200"></div>
        <div class="column-2 w-col w-col-4"><img src="{{ asset('kings-landing/images/musiga2.png') }}" width="200"></div>
        <div class="w-col w-col-4"><img src="{{ asset('kings-landing/images/ACA.png') }}" width="200"></div>
    </div>
</div>
</body>
