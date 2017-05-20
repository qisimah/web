@extends('layouts.master')
@section('title')
    File Uploads
@endsection
@section('content')
<div class="page-content container-fluid">
    <div class="row">
        <div class="col-xs-12 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1">
            <div class="widget">
                <div class="widget-heading">
                    <h3 class="widget-title">Upload a new file</h3>
                </div>
                <div class="widget-body">

                    {{--<div class="row">--}}
                        {{--<div class="col-xs-12">--}}
                            {{--<form method="post" id="type-dz" action="/file" class="dropzone"></form>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    {!! Form::open(['method' => 'POST', 'action' => 'FileController@store', 'files' => true]) !!}
                        @include('components.fileform')
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    {!! Form::label('img', 'Select Image File') !!}
                                    {!! Form::file('img', null, ['class' => 'filestyle', 'data-buttonname' => 'btn-outline btn-primary', 'data-iconname' => 'ti-zip']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    {!! Form::label('audio', 'Select Audio File') !!}
                                    {!! Form::file('audio', null, ['class' => 'filestyle', 'data-buttonname' => 'btn-outline btn-primary', 'data-iconname' => 'ti-zip']) !!}
                                </div>
                            </div>
                        </div>
                        {!! Form::submit('Submit', ['class' => 'btn btn-primary btn-outline']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
    @stop