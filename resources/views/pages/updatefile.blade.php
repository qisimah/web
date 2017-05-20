@extends('layouts.master')
@section('title')
    Update File
@endsection
@section('content')
    <div class="page-content container-fluid">
        <div class="row">
            <div class="col-xs-12 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1">
                <div class="widget">
                    <div class="widget-heading">
                        <h3 class="widget-title">Update file details</h3>
                    </div>
                    <div class="widget-body">

                        {{--<div class="row">--}}
                        {{--<div class="col-xs-12">--}}
                        {{--<form method="post" id="type-dz" action="/file" class="dropzone"></form>--}}
                        {{--</div>--}}
                        {{--</div>--}}

                        {!! Form::model($file, ['method' => 'PUT', 'route' => ['file.update', $file]]) !!}
                            @include('components.fileform')
                        {!! Form::submit('Submit', ['class' => 'btn btn-primary btn-outline']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop