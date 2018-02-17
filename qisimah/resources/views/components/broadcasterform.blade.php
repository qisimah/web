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
            <select name="country" id="broadcaster-country" class="form-control chosen-select">
                <option value="" disabled selected>Select Country</option>
                @foreach($countries as $country)
                    <option value="{{ $country->id }}" {{ ($broadcaster->country_id === $country->id)? 'selected' : '' }}>{{ $country->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="broadcaster-region">Region: </label>
            <select name="region" id="broadcaster-region" class="form-control chosen-select">
                @if(!$broadcaster->exists())
                    <option value="" disabled selected>Select Region</option>
                @endif
                @foreach($regions as $region)
                    <option value="{{ $region->id }}" {{ ($broadcaster->region_id === $region->id)? 'selected' : '' }}>{{ $region->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="broadcaster-address">Address: </label>
            <input type="text" name="address" id="broadcaster-address" class="form-control" value="{{ $broadcaster->address ?? '' }}">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="broadcaster-city">City: </label>
            <input type="text" name="city" id="broadcaster-city" class="form-control" value="{{ $broadcaster->city ?? '' }}">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('stream_id', 'Stream ID:') !!}
            {!! Form::text('stream_id', null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="selTags">Tags: </label>
            <select name="tags[]" id="selTags" multiple class="form-control chosen-select" style="height: 30px">
                <option value="">select tags</option>
                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}" {{ (in_array($tag->id, $broadcaster->tags()->pluck('tags.id')->toArray()))? 'selected' : '' }}>{{ $tag->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
{{--this tag will be closed in another file--}}