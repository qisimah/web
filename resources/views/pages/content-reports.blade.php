@extends('layouts.reports')
@section('report-title')
    content report
@endsection

@section('filter')
    <form class="row">
    @if($user['type'] === 'admin' || $user['type'] === 'record-label')
            <input id="hidRole" value="{{$user['type']}}" type="hidden">
            @if($user['type'] <> 'artist')
                <div class="col-md-3 form-group">
                    <label>Artists:</label>

                    <select id="selRepArtists" class="form-control chosen-select">

                        <option value="" selected disabled>choose artists</option>

                        @foreach($artists as $artist)
                        <option value="{{$artist['id']}}">{{$artist['nick_name']}}</option>
                        @endforeach

                    </select>
                </div>
            @endif
                <div class="col-md-3 form-group">
                    <label>Title:</label>
                    <select id="selRepTitle" class="form-control">
                        <option value="" selected disabled>choose title</option>
                    </select>
                </div>

            @else
                <div class="col-md-3 form-group">
                    <label>Title:</label>
                    <select id="c-filter" class="form-control">
                        <option value="" selected disabled>choose title</option>
                    </select>
                </div>
            @endif
                <div class="col-md-4 form-group">
                    <label for="start-date">Select date:</label>
                    <div class="input-group input-daterange" data-date-format="yyyy-mm-dd" data-provide="datepicker">
                        <input id="start-date" type="text" class="form-control search-dates" value="{{date('Y-m-d')}}">
                        <div class="input-group-addon">to</div>
                        <input id="end-date" type="text" class="form-control search-dates" value="{{date('Y-m-d')}}">
                    </div>
                </div>
                <div class="col-md-2 form-group">
                    <label for=""><br></label>
                    <button id="fetch-content-by-date" name="fetctplays" class="fetchable btn btn-primary btn-outline form-control">
                        fetch
                    </button>
                    <button id="show-heat-map" name="show_heat_map" class="btn btn-danger btn-outline form-control" style="display: none">
                        show heat map
                    </button>
                </div>
        </form>
        <div id="map" class="container" style="width: 100%; height: 600px; display: none;">
            generating heat map....
            <div class="progress">
                <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                    <span class="sr-only"></span>
                </div>
            </div>
        </div>

@endsection
@section('report-table')
    <table id="content-report" class="table table-responsive table-striped table-hover">
        <thead>
        <tr>
            <th class="text-center">Broadcaster name</th>
            <th class="text-center">Broadcaster location</th>
            <th class="text-center">Broadcaster reach</th>
            <th class="text-center">Played at</th>
        </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
@endsection