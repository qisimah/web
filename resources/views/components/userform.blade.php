<div class="row">
    <div class="col-xs-12">
        <div class="form-group">
            {!! Form::text('firstname', null, ['class' => 'form-control text-center', 'placeholder' => 'enter first name']) !!}
        </div>
    </div>
    <div class="col-xs-12">
        <div class="form-group">
            {!! Form::text('lastname', null, ['class' => 'form-control text-center', 'placeholder' => 'enter last name']) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="form-group">
            {!! Form::text('email', null, ['class' => 'form-control text-center', 'placeholder' => 'enter email']) !!}
        </div>
    </div>
    <div class="col-xs-12">
        <div class="form-group">
            {!! Form::select('gender', ['Male' => 'Male', 'Female' => 'Female', '' => 'choose gender'], '', ['class' => 'form-control text-center']) !!}
        </div>
    </div>
    <div class="col-xs-12">
        <div class="form-group">
            {!! Form::select('type', ['admin' => 'admin', 'record-label' => 'record label', 'ad-agency' => 'ad-agency', 'artist' => 'artist', 'advertiser' => 'advertiser', '' => 'choose user type'], '', ['class' => 'form-control text-center']) !!}
        </div>
    </div>
    <div class="col-xs-12">
        <div class="form-group">
            {!! Form::select('role', ['master' => 'master', 'seer' => 'seer', 'uploader' => 'uploader', 'user' => 'user', '' => 'choose user role'], '', ['class' => 'form-control text-center']) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="form-group">
            {!! Form::submit('create', ['class' => 'form-control btn-black btn btn-outline']) !!}
        </div>
    </div>
</div>

{{--this tag will be closed in another file--}}