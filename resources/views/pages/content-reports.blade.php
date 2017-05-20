@extends('layouts.reports')
@section('report-title')
    content report
@endsection
@section('filter')
    <div class="col-md-4 form-group">
        <label>contents:</label>
        <select id="c-filter" class="form-control">
            <option value="" selected disabled>choose content</option>
            @foreach($contents as $content)
                <option value="{{$content->acr_id}}">{{$content->title}} - {{$content->artists}}</option>
            @endforeach
        </select>
    </div>
@endsection
@section('fetch-button')
    <button id="fetch-content-by-date" name="fetctplays" class="fetchable btn btn-primary btn-outline form-control">fetch</button>
@endsection
@section('report-table')
    <table id="content-report" style="width: 100%" class="table table-hover dt-responsive nowrap">
        <thead>
        <tr>
            <th class="text-center">broadcaster name</th>
            <th class="text-center">broadcaster location</th>
            <th class="text-center">broadcaster reach</th>
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