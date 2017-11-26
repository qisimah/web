@extends('layouts.master')
@section('title')
    <div class="row">
        <div class="col-xs-12 col-md-6 pull-left">
            @yield('report-title')
        </div>

    </div>
@endsection
@section('content')
    <div class="page-content container-fluid">
        @yield('report-form')
        <div class="row">
            @yield('filter')
            <form class="col-md-8 col-xs-12">

            </form>
        </div>
        <div class="row">
            <label>showing results for: @yield('report-type')</label>
        </div>

        <div class="widget">
            <div class="widget-body table-responsive">
                @yield('report-table')
            </div>
        </div>
    </div>
    @endsection