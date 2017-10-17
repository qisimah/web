@extends('auth.layout')
@section('content')
<form method="post" role="form" action="{{route('register')}}" class="form-horizontal">
    {{csrf_field()}}
    <div class="form-group">
        <label class="text-warning validation"></label>
        <div class="col-xs-12">
            <input id="first_name" type="text" name="first-name" placeholder="first name" class="form-control" required>
        </div>
    </div>
    <div class="form-group">
        <label class="text-warning validation"></label>
        <div class="col-xs-12">
            <input id="last_name" type="text" name="last-name" placeholder="last name" class="form-control" required>
        </div>
    </div>
    <div class="form-group">
        <label class="text-warning validation"></label>
        <div class="col-xs-12">
            <input id="email" type="text" name="email" placeholder="em@il" class="form-control" required>
        </div>
    </div>
    <div class="form-group">
        <label class="text-warning validation"></label>
        <div class="col-xs-12">
            <input id="password" name="password" type="password" placeholder="password" class="form-control" required>
        </div>
    </div>
    <div class="form-group">
        <label class="text-warning validation"></label>
        <div class="col-xs-12">
            <input id="password_confirm" name="password-confirm" type="password" placeholder="confirm password" class="form-control" required>
        </div>
    </div>
    <div class="form-group">
        <div class="col-xs-12">
            <label class="text-white">User: </label>
            <div style="margin-bottom: 7px" class="radio-inline radio-custom">
                <input id="advertiser" name="user" type="radio" value="advertiser">
                <label for="advertiser" class="text-white">advertiser</label>
            </div>
            <div style="margin-bottom: 7px" class="radio-inline radio-custom">
                <input id="radio-station" name="user" type="radio" value="radio-station">
                <label for="radio-station" class="text-white">radio station</label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-xs-12">
            <div style="margin-bottom: 7px" class="checkbox-inline checkbox-custom">
                <input id="exampleCheckboxAgree" name="t-c" type="checkbox" value="remember">
                <label for="exampleCheckboxAgree" class="checkbox-muted text-muted">Agree the terms and policy</label>
            </div>
        </div>
    </div>
    <button id="sign-up" type="submit" class="btn-lg btn btn-primary btn-rounded btn-block btn-outline">Sign up</button>
</form>
<hr>
<h1 class="wow fadeInLeft"> Contact us to get your account setup</h1>
<!-- <p class="text-muted">Sign up with your Facebook or Twitter accounts</p> -->
<div class="clearfix">
    <div class="pull-left">
        <button type="button" style="width: 130px" class="btn btn-outline btn-rounded btn-primary"><i class="ti-facebook mr-5"></i> Facebook</button>
    </div>
    <div class="pull-right">
        <button type="button" style="width: 130px" class="btn btn-outline btn-rounded btn-info"><i class="ti-twitter-alt mr-5"></i> Twitter</button>
    </div>
</div>
<hr>
<div class="clearfix">
    <p class="text-muted mb-0 pull-left">Already have an account?    </p><a href="/login" class="inline-block pull-right">Sign In</a>
</div>
@endsection