@extends('auth.layout')
@section('content')
    <div style="color: white">
        <p>
            <label class="text-success">
                you are just a step away....enter a new password below!
            </label>
        </p>
        <label class="text-success">
            {{--enter a new password below!--}}
        </label>
    </div>
    <form method="post" action="/account/password/create" class="form-horizontal">
        {{csrf_field()}}
        <div class="form-group">
            <div class="col-xs-12 text-primary">
                <input name="password" type="password" placeholder="new password" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-12">
                <input name="retypepassword" type="password" placeholder="retype password" class="form-control">
            </div>
        </div>
        <button type="submit" class="btn-lg btn btn-primary btn-rounded btn-block btn-outline">create password</button>
    </form>
    {{--<div class="page-content container-fluid">--}}
        {{--<div class="row">--}}
            {{--<div class="col-xs-12 col-md-6 col-md-offset-3">--}}
                {{--<div class="widget">--}}
                    {{--<div class="widget-heading">--}}
                        {{--<h3 class="widget-title">add new user</h3>--}}
                    {{--</div>--}}
                    {{--<div class="widget-body">--}}
                        {{--{!! Form::open(['route' => 'admin.store']) !!}--}}
                        {{--<div class="row">--}}
                            {{--<div class="col-xs-12">--}}
                                {{--<div class="form-group">--}}
                                    {{--{!! Form::text('email', null, ['class' => 'form-control text-center', 'placeholder' => 'enter email']) !!}--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="col-xs-12">--}}
                                {{--<div class="form-group">--}}
                                    {{--{!! Form::select('gender', ['Male' => 'Male', 'Female' => 'Female', '' => 'choose gender'], '', ['class' => 'form-control text-center']) !!}--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="col-xs-12">--}}
                                {{--<div class="form-group">--}}
                                    {{--{!! Form::select('type', ['admin' => 'admin', 'artist' => 'artist', '' => 'choose user type'], '', ['class' => 'form-control text-center']) !!}--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="col-xs-12">--}}
                                {{--<div class="form-group">--}}
                                    {{--{!! Form::select('role', ['master' => 'master', 'seer' => 'seer', '' => 'choose user type'], '', ['class' => 'form-control text-center']) !!}--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="row">--}}
                            {{--<div class="col-xs-12">--}}
                                {{--<div class="form-group">--}}
                                    {{--{!! Form::submit('create', ['class' => 'form-control btn-primary btn btn-outline']) !!}--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--{!! Form::close() !!}--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
@endsection