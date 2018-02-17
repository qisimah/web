@extends('layouts.reports')@section('report-title')    content report@endsection@section('filter')@include('components.content-report-form')    <div id="map" class="container" style="width: 100%; height: 600px; display: none;">        generating heat map....        <div class="progress">            <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100"                 aria-valuemin="0" aria-valuemax="100" style="width: 100%">                <span class="sr-only"></span>            </div>        </div>    </div>@endsection@section('report-table')    <div class="row">        <div class="table-responsive">            <table id="" class="table table-striped table-hover table-bordered">                <thead>                <tr>                    <th class="text-center">Broadcaster Name - Frequency</th>                    <th class="text-center">Broadcaster Location, Country</th>                    <th class="text-center">Played at</th>                </tr>                </thead>                <tbody>                @if( count($records) )                    @foreach($records as $record)                        <tr>                            <td class="text-left">{{ $record->broadcaster->name }}                                - {{ $record->broadcaster->frequency }} MHz</td>                            <td class="text-left">{{ $record->broadcaster->city }}                                , {{ $record->broadcaster->country->name }}</td>                            <td class="text-center">{{ $record->created_at }}</td>                        </tr>                    @endforeach                @else                    <tr>                        <td colspan="3" class="text-center">no plays found</td>                    </tr>                @endif                </tbody>            </table>        </div>        {{ $records->links() }}    </div>@endsection