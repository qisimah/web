@extends('layouts.master')
@section('title')
    @yield('report-title')
@endsection
@section('content')
    <div class="page-content container-fluid">
        @yield('report-form')
        <div class="row">
            @yield('filter')
            <form class="col-md-8 col-xs-12">
                <label>select date:</label>
                <div class="col-xs-12">
                    <div class="col-md-8 col-xs-12">
                        <div class="form-group">
                            <div class="input-group input-daterange" data-date-format="yyyy-mm-dd" data-provide="datepicker">
                                <input id="start-date" type="text" class="form-control search-dates" value="{{date('Y-m-d')}}">
                                <div class="input-group-addon">to</div>
                                <input id="end-date" type="text" class="form-control search-dates" value="{{date('Y-m-d')}}">
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="form-group">
                            @yield('fetch-button')
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="row">
            <label>showing results for: @yield('report-type')</label>
        </div>

        <div class="widget">
            <div class="widget-body">
                @yield('report-table')
            </div>
        </div>
    </div>
    @endsection