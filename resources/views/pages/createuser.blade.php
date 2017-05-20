@extends('layouts.master')
@section('title')
    Users
@endsection
@section('content')
    <div class="page-content container-fluid">
        <div class="row">
            <div class="col-xs-12 col-md-6 col-md-offset-3">
                <div class="widget">
                    <div class="widget-heading">
                        <h3 class="widget-title">add new user</h3>
                    </div>
                    <div class="widget-body">
                        {!! Form::open(['route' => 'admin.store']) !!}
                        @include('components.userform')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection