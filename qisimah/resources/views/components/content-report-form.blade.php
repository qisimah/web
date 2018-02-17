@if($errors->any())
    <div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        @foreach($errors->all() as $error)
            {{ $error }}
        @endforeach
    </div>
@endif

<form class="row" id="content-report-form" method="post" action="{{ url('report/content') }}">
    {{ csrf_field() }}
    @if($user['type'] === 'admin' || $user['type'] === 'record-label')
        <input id="hidRole" value="{{$user['type']}}" type="hidden">
        @if($user['type'] <> 'artist')
            <div class="col-md-3 form-group">
                <label for="selRepArtists">Artists:</label>
                <select name="artist_id" id="selRepArtists" class="form-control chosen-select" required>
                    <option value="" selected disabled>choose artists</option>
                    @foreach($artists as $artist)
                        <option value="{{ $artist->id }}" {{ (old('artist_id') === $artist->id)? "selected" : "" }}>{{ $artist->nick_name }}</option>
                    @endforeach
                </select>
            </div>
        @endif
        <div class="col-md-3 form-group">
            <label for="selRepTitle">Title:</label>
            <select name="q_id" id="selRepTitle" class="form-control" required>
                <option value="{{old('q_id') ?? ''}}" selected disabled>{{ $title ?? "choose title" }}</option>
            </select>
        </div>
    @else
        <div class="col-md-3 form-group">
            <label for="c-filter">Title:</label>
            <select name="q_id" id="c-filter" class="form-control" required>
                <option value="{{old('q_id') ?? ''}}" selected disabled>{{ $title ?? "choose title" }}</option>
            </select>
        </div>
    @endif
    <div class="col-md-4 form-group">
        <label for="start-date">Select date:</label>
        <div class="input-group input-daterange" data-date-format="yyyy-mm-dd" data-provide="datepicker">
            <input name="start_date" id="start-date" type="text" class="form-control search-dates"
                   value="{{ $start ?? date('Y-m-d') }}" required>
            <div class="input-group-addon">to</div>
            <input name="end_date" id="end-date" type="text" class="form-control search-dates"
                   value="{{ $end ?? date('Y-m-d') }}" required>
        </div>
    </div>

    <div class="col-md-2 form-group">
        <label for="show">Show</label>
        <select name="show" id="show" class="form-control"
                onchange="document.querySelector('#content-report-form').submit()">
            <option value="" disabled selected>Select type</option>
            <option value="plays">Plays</option>
            <option value="heat map">Heat Map</option>
        </select>
    </div>
</form>