@extends('layouts.master')
@section('title')
    Add Broadcaster
@endsection
@section('content')
<div class="page-content container-fluid">
    <div class="row">
        <div class="col-xs-12 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1">
            <div class="widget">
                <div class="widget-heading">
                    <h3 class="widget-title">add new broadcaster</h3>
                </div>
                <div class="widget-body">
                    {!! Form::model( $broadcaster, ['route' => ['broadcaster.update', $broadcaster], 'files' => true, 'method' => 'PUT']) !!}
                        @include('components.broadcasterform')
                            <div class="col-xs-12 col-md-6">
                                <div class="form-group">
                                    {!! Form::label('img', 'Select Image File') !!}
                                    {!! Form::file('img', null, ['class' => 'filestyle', 'data-buttonname' => 'btn-outline btn-primary', 'data-iconname' => 'ti-zip']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="text-right">
                        {!! Form::submit('Submit', ['class' => 'btn btn-primary btn-outline']) !!}
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
    @stop