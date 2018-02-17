
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('artist', 'Artist') !!}
            {!! Form::text('artist', null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('title', 'Title') !!}
            {!! Form::text('title', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('featured', 'Featured') !!}
            {!! Form::text('featured', null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('genre', 'Genre') !!}
            {!! Form::select('genre', ['Hip Hip' => 'Hip Hop', 'Hip Life' => 'Hip Life'], null, [
            'placeholder' => 'Select genre', 'class' => 'form-control']) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('album', 'Album') !!}
            {!! Form::text('album', null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('year', 'Year') !!}
            {!! Form::text('year', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('producer', 'Producer') !!}
            {!! Form::text('producer', null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('label', 'Record Label') !!}
            {!! Form::text('label', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>