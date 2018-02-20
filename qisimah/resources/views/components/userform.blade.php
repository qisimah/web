<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="form-group">
            <label for="user-first_name">First Name: </label>
            <input type="text" class="form-control" placeholder="first name" id="user-first-name" name="firstname" value="{{ old('firstname') }}" required>
            {{--{!! Form::text('firstname', null, ['class' => 'form-control text-center', 'placeholder' => 'enter first name']) !!}--}}
        </div>
    </div>
    <div class="col-xs-12 col-md-6">
        <div class="form-group">
            <label for="user-last-name">Last Name: </label>
            <input type="text" class="form-control" placeholder="last name" id="user-last-name" name="lastname" value="{{ old('lastname') }}" required>
            {{--{!! Form::text('lastname', null, ['class' => 'form-control text-center', 'placeholder' => 'enter last name']) !!}--}}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="form-group">
            <label for="user-email">Email: </label>
            <input type="text" class="form-control" placeholder="user@email.com" id="user-email" name="email" value="{{ old('email') }}" required>
            {{--{!! Form::text('email', null, ['class' => 'form-control text-center', 'placeholder' => 'enter email']) !!}--}}
        </div>
    </div>
    <div class="col-xs-12 col-md-6">
        <div class="form-group">
            <label for="user-gender">User gender: </label>
            <select name="gender" id="user-gender" class="form-control" required>
                <option value="" selected disabled="">Choose gender</option>
                <option value="male" @if(old('gender') === 'male') selected @endif>Male</option>
                <option value="female" @if(old('gender') === 'female') selected @endif>Female</option>
            </select>
            {{--{!! Form::select('gender', ['Male' => 'Male', 'Female' => 'Female', '' => 'choose gender'], '', ['class' => 'form-control text-center']) !!}--}}
        </div>
    </div>
    <div class="col-xs-12 col-md-6">
        <div class="form-group">
            <label for="user-type">User type: </label>
            <select name="type" id="user-type" class="form-control" required>
                <option value="" selected disabled="">choose user type</option>
                <option value="admin" @if(old('type') === 'admin') selected @endif>Admin</option>
                <option value="artist" @if(old('type') === 'artist') selected @endif>Artist</option>
                <option value="advertiser" @if(old('type') === 'advertiser') selected @endif>Advertiser</option>
                <option value="ad-agency" @if(old('type') === 'ad-agency') selected @endif>Ad Agency</option>
                <option value="record-label" @if(old('type') === 'record-label') selected @endif>Record Label</option>
            </select>
{{--            {!! Form::select('type', ['admin' => 'admin', 'record-label' => 'record label', 'ad-agency' => 'ad-agency', 'artist' => 'artist', 'advertiser' => 'advertiser', '' => 'choose user type'], '', ['class' => 'form-control text-center']) !!}--}}
        </div>
    </div>
    <div class="col-xs-12 col-md-6">
        <div class="form-group">
            <label for="user-role">User role: </label>
            <select name="role" id="user-role" class="form-control" required>
                <option value="" selected disabled="">choose user role</option>
                <option value="user" @if(old('role') === 'user') selected @endif>User</option>
                <option value="uploader" @if(old('role') === 'uploader') selected @endif>Uploader</option>
                <option value="seer" @if(old('role') === 'seer') selected @endif>Seer</option>
            </select>
{{--            {!! Form::select('role', ['master' => 'master', 'seer' => 'seer', 'uploader' => 'uploader', 'user' => 'user', '' => 'choose user role'], '', ['class' => 'form-control text-center']) !!}--}}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-md-6"></div>
    <div class="col-xs-12 col-md-6">
        <div class="form-group">
            <input type="submit" class="form-control btn btn-black btn-outline" value="create user" name="create-user" id="create-user">
            {{--{!! Form::submit('create', ['class' => 'form-control btn-primary btn btn-outline']) !!}--}}
        </div>
    </div>
</div>

{{--this tag will be closed in another file--}}