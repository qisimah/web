<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('frequency', 'Frequency:') !!}
            {!! Form::text('frequency', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('tagline', 'Tagline:') !!}
            {!! Form::text('tagline', null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('reach', 'Reach:') !!}
            {!! Form::text('reach', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="broadcaster-country">Country: </label>
            <select name="country" id="broadcaster-country" class="form-control">
                <option value="" disabled selected>Select Country</option>
                @foreach($countries as $country)
                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="broadcaster-country">Region: </label>
            <select name="region" id="broadcaster-region" class="form-control">
                <option value="" disabled selected>Select Region</option>
                @foreach($regions as $region)
                    <option value="{{ $region->id }}">{{ $region->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('address', 'Address:') !!}
            {!! Form::text('address', null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('city', 'City:') !!}
            {!! Form::text('city', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('tags', 'Tags:') !!}
            {!! Form::text('tags', null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('stream_id', 'Stream ID:') !!}
            {!! Form::text('stream_id', null, ['class' => 'form-control']) !!}
        </div>
    </div>
{{--this tag will be closed in another file--}}