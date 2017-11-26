@extends('layouts.reports')
@section('report-title')
    broadcaster report
@endsection
@section('filter')
    <form class="">
        <div class="col-md-4 form-group">
            <label>broadcasters:</label>
            <select id="b-filter" class="form-control chosen-select">
                <option value="" selected disabled>choose broadcaster</option>
                @foreach($broadcasters as $broadcaster)
                    <option value="{{$broadcaster->stream_id}}">{{$broadcaster->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-4 form-group">
            <label>select date:</label>
            <div class="input-group input-daterange" data-date-format="yyyy-mm-dd" data-provide="datepicker">
                <input id="start-date" type="text" class="form-control search-dates" value="{{date('Y-m-d')}}">
                <div class="input-group-addon">to</div>
                <input id="end-date" type="text" class="form-control search-dates" value="{{date('Y-m-d')}}">
            </div>
        </div>
        <div class="col-md-4 form-group">
            <label><br></label>
            <button id="fetch-broadcaster-by-date" type="submit" class="fetchable btn btn-primary btn-outline form-control">
                fetch
            </button>
        </div>
    </form>
    <div class="col-md-4 form-group">
        <label>broadcasters:</label>
        <select id="b-filter" class="form-control">
            <option value="" selected disabled>choose broadcaster</option>
            @foreach($broadcasters as $broadcaster)
                <option value="{{$broadcaster->stream_id}}">{{$broadcaster->name}}</option>
            @endforeach
        </select>
    </div>
@endsection
@section('fetch-button')
    <button id="fetch-broadcaster-by-date" name="fetctplays" class="fetchable btn btn-primary btn-outline form-control">fetch</button>
@endsection
@section('report-table')
    <table id="broadcaster-report" class="table table-responsive table-striped table-hover">
        <thead>
        <tr>
            <th class="text-center">Title</th>
            <th class="text-center">Artist</th>
            <th class="text-center">Album</th>
            <th class="text-center">Played at</th>
        </tr>
        </thead>
        <tbody>
        {{--<tr>--}}
            {{--<td colspan="4" class="text-center">select dates and click fetch to display detections</td>--}}
        {{--</tr>--}}
    <table id="broadcaster-report" style="width: 100%" class="table table-hover dt-responsive nowrap">
        <thead>
        <tr>
            <th class="text-center">title</th>
            <th class="text-center">artist</th>
            <th class="text-center">album</th>
            <th class="text-center">play time</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td colspan="4" class="text-center">select dates and click fetch to display detections</td>
        </tbody>
    </table>
@endsection