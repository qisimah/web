@extends('auth.layout')
@section('content')
    <form method="post" action="/login" class="form-horizontal">
        {{csrf_field()}}
        <div class="form-group">
            <div class="col-xs-12">
                <input id="userEmail" name="userEmail" type="text" placeholder="Em@il" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-12">
                <input id="userPassword" name="userPassword" type="password" placeholder="Password" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-12">
                <div class="checkbox-inline checkbox-custom pull-left">
                    <input id="remember" name="remember" type="checkbox" checked>
                    <label for="exampleCheckboxRemember" class="checkbox-muted text-muted">Remember me</label>
                </div>
                <div class="pull-right"><a href="forgot-password.html" class="inline-block form-control-static" style="color: #fff;"><strong>Forgot a Passowrd?</strong></a></div>
            </div>
        </div>
        <button id="login" type="submit" class="btn-lg btn btn-primary btn-rounded btn-block">Sign in</button>
    </form>
    {{--<hr>--}}
    {{--<p class="text-muted">Sign in with your Facebook or Twitter accounts</p>--}}
    {{--<div class="clearfix">--}}
        {{--<div class="pull-left">--}}
            {{--<button type="button" style="width: 130px" class="btn btn-outline btn-rounded btn-primary"><i class="ti-facebook mr-5"></i> Facebook</button>--}}
        {{--</div>--}}
        {{--<div class="pull-right">--}}
            {{--<button type="button" style="width: 130px" class="btn btn-outline btn-rounded btn-info"><i class="ti-twitter-alt mr-5"></i> Twitter</button>--}}
        {{--</div>--}}
    {{--</div>--}}
    <hr>
    <div class="clearfix">
        <p class="text-muted mb-0 pull-left">Want new account?</p>
        <a href="/register" class="inline-block pull-right">Sign Up</a>
    </div>
@endsection
