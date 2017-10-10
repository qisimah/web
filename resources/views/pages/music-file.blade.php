@extends('layouts.file')
@section('fileType')
    upload new song
@endsection
@section('form')
    <form action="/file/create/song" method="post" id="frmSongUpload" class="form-horizontal">
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-6">
                <div class="form-group has-feedback">
                    <label for="txtSongTitle" class="col-sm-3 col-md-4 control-label">Song Title: *</label>
                    <div class="col-sm-9 col-md-8">
                        <input id="txtSongTitle" name="txtSongTitle" type="text" class="form-control isValid" placeholder="type song title..." required>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group has-feedback">
                    <label for="selSongArtist" class="col-sm-3 col-md-4 control-label">Artist:* </label>
                    <div class="col-sm-9 col-md-8">
                        <select name="selSongArtist" id="selSongArtist" class="form-control chosen-select isValid" size="8">
                            @foreach($artists as $artist)
                                <option value="{{$artist->id}}">{{$artist->nick_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group has-feedback">
                    <label for="selGenre" class="col-sm-3 col-md-4 control-label">Genre: *</label>
                    <div class="col-sm-9 col-md-8">
                        <select name="selGenre" id="selGenre" class="form-control chosen-select isValid" size="8" multiple="multiple" required>
                            @foreach($genres as $genre)
                                <option value="{{$genre->id}}">{{$genre->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group has-feedback">
                    <label for="selArtists" class="col-sm-3 col-md-4 control-label">Featured:</label>
                    <div class="col-sm-9 col-md-8">
                        <select name="selArtists" id="selArtists" class="form-control chosen-select isValid" size="8" multiple="multiple">
                            @foreach($artists as $artist)
                                <option value="{{$artist->id}}">{{$artist->nick_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group has-feedback">
                    <label for="selProducers" class="col-sm-3 col-md-4 control-label">Producers: *</label>
                    <div class="col-sm-9 col-md-8">
                        <select name="selProducers" id="selProducers" class="form-control chosen-select isValid" size="8" multiple="multiple" required>
                            @foreach($producers as $producer)
                                <option value="{{$producer->q_id}}">{{$producer->nick_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group has-feedback">
                    <label for="txtReleaseDate" class="col-sm-3 col-md-4 control-label">Release Date: *</label>
                    <div class="col-sm-9 col-md-8">
                        <div class="input-group input-daterange" data-date-format="yyyy-mm-dd" data-provide="datepicker">
                            <input id="txtReleaseDate" name="txtReleaseDate" type="text" class="form-control search-dates" value="{{date('Y-m-d')}}" style="width: 100%" required>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group has-feedback">
                    <label for="txtPromoArt" class="col-sm-3 col-md-4 control-label">Promo Art:</label>
                    <div class="col-sm-9 col-md-8">
                        <input id="txtPromoArt" name="txtPromoArt" type="file" class="form-control filestyle" data-buttonText="Select Promo Art" data-buttonName="btn btn-primary btn-outline" data-placeholder="no image selected">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group has-feedback">
                    <label for="txtAudioFile" class="col-sm-3 col-md-4 control-label">Audio File: *</label>
                    <div class="col-sm-9 col-md-8">
                        <input id="txtAudioFile" name="txtAudioFile" type="file" class="form-control filestyle" data-buttonText="Select Audio File" data-buttonName="btn btn-primary btn-outline" data-placeholder="no audio selected" required>
                    </div>
                </div>
            </div>
        </div>
        {{--<div class="row">--}}
            {{--<div class="col-md-6">--}}
                {{--<div class="form-group has-feedback">--}}
                    {{--<label for="txtAudioFile" class="col-sm-3 col-md-4 control-label">Album:</label>--}}
                    {{--<div class="col-sm-9 col-md-8">--}}
                        {{--<input id="txtAlbum" name="txtAlbum" type="text" class="form-control" placeholder="type album name...">--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-md-6">--}}
                {{--<div class="form-group has-feedback">--}}
                    {{--<label for="txtRecordLabel" class="col-sm-3 col-md-4 control-label">Record Label:</label>--}}
                    {{--<div class="col-sm-9 col-md-8">--}}
                        {{--<input id="txtRecordLabel" name="txtRecordLabel" type="text" class="form-control" placeholder="type label...">--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        <hr>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">

                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="" class="col-sm-3 col-md-4 control-label"></label>
                    <div class="col-sm-9 col-md-8">
                        <input id="btnUploadSong" name="btnUploadSong" type="submit" value="upload song" class="btn btn-block btn-outline btn-primary">
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div id="upload-opt" class="row" hidden>
        <div class="col-md-6">
            <a href="/file" class="btn btn-outline btn-primary">view files</a>
            @if($user['type'] === 'advertiser' || $user['type'] === 'ad-agency')
                <a href="/file/create/ad" class="btn btn-primary">upload another file</a>
            @elseif($user['type'] === 'artist' || $user['type'] === 'record label')
                <a href="/file/create/song" class="btn btn-primary">upload another file</a>
            @elseif($user['type'] === 'admin')
                <a href="/file/create/ad" class="btn btn-primary">upload ad</a>
                <a href="/file/create/song" class="btn btn-primary">upload song</a>
            @endif
        </div>
    </div>
@endsection