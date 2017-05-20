@extends('layouts.reports')
@section('report-title')
    broadcaster report
@endsection
@section('filter')
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
        </tr>
        </tbody>
    </table>
@endsection