@extends('layouts.reports')
@section('report-title')
    general report
@endsection
@section('fetch-button')
    <button id="fetch-plays-by-date" name="fetctplays" class="fetchable btn btn-primary btn-outline form-control">fetch</button>
@endsection
@section('report-table')
    <table id="general-reports" style="width: 100%" class="table table-hover dt-responsive nowrap">
        <thead>
        <tr>
            <th class="text-center">title</th>
            <th class="text-center">artist</th>
            <th class="text-center">broadcaster</th>
            <th class="text-center">time played</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td colspan="4" class="text-center">select dates and click fetch to display detections</td>
        </tr>
        </tbody>
    </table>
@endsection