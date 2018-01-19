@extends('layouts.reports')@section('report-title')    general report@endsection@section('report-form')    <form class="" method="post" action="/plays">        {{ csrf_field() }}        <div class="col-md-8 form-group">            <label>select date:</label>            <div class="input-group input-daterange" data-date-format="yyyy-mm-dd" data-provide="datepicker">                <input id="start-date" type="text" class="form-control search-dates" value="{{ old('start_date') ?? date                ('Y-m-d') }}" name="start_date">                <div class="input-group-addon">to</div>                <input id="end-date" type="text" class="form-control search-dates" value="{{ old('end_date') ?? date                ('Y-m-d')}}" name="end_date">            </div>        </div>        <div class="col-md-4 form-group">            <label><br></label>            <button id="" type="submit" class="btn btn-primary btn-outline form-control">                fetch            </button>        </div>    </form>@endsection@section('report-type')    {{ (isset($plays))? $plays->total() : 0 }}@endsection@section('report-table')    <table id="" class="table table-striped table-hover table-bordered">        <thead>        <tr>            <th class="text-center">Title</th>            <th class="text-center">Artists</th>            <th class="text-center">Broadcaster</th>            <th class="text-center">Time Stamp</th>        </tr>        </thead>        <tbody>        @if(isset($plays) && count($plays))            @foreach($plays as $play)                <tr>                    <td>{{ $play->file->title }}</td>                    <td class="text-right">                        {{ $play->file->artist->nick_name }}                        @if(count($play->file->artists))                            ft.                            @foreach($play->file->artists as $artist)                                @php(                                    $names[] = $artist->nick_name                                )                            @endforeach                            {{ implode(' / ', $names) }}                            @php($names = [])                        @endif                    </td>                    <td class="text-right">{{ $play->broadcaster->name.' - '.$play->broadcaster->city.', '                    .$play->broadcaster->country->name                }}</td>                    <td class="text-center">{{ $play->created_at }}</td>                </tr>            @endforeach        @else            <tr>                <td colspan="4" class="text-center">No data found!</td>            </tr>        @endif        </tbody>    </table>    <div class="text-right">        @if(isset($plays) && count($plays))            {{ $plays->links() }}        @endif    </div>@endsection