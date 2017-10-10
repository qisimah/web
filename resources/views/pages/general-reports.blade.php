@extends('layouts.reports')
@section('report-title')
    general report
@endsection
@section('report-form')
    <form class="">
        <div class="col-md-8 form-group">
            <label>select date:</label>
            <div class="input-group input-daterange" data-date-format="yyyy-mm-dd" data-provide="datepicker">
                <input id="start-date" type="text" class="form-control search-dates" value="{{date('Y-m-d')}}">
                <div class="input-group-addon">to</div>
                <input id="end-date" type="text" class="form-control search-dates" value="{{date('Y-m-d')}}">
            </div>
        </div>
        <div class="col-md-4 form-group">
            <label><br></label>
            <button id="fetch-plays-by-date" type="submit" class="fetchable btn btn-primary btn-outline form-control">
                fetch
            </button>
        </div>
    </form>
@endsection
@section('report-table')
    <table id="general-reports"
           class="table table-responsive table-striped table-hover">
        <thead>
        <tr>
            <th class="text-center">title</th>
            <th class="text-center">artist</th>
            <th class="text-center">broadcaster</th>
            <th class="text-center">time played</th>
        </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
@endsection