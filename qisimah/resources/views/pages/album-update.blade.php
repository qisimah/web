@extends('layouts.file')
@section('title')
    Albums
@endsection

@section('fileType')
    update album
@endsection

@section('form')
    @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('albums.update', $album) }}" class="row" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" value="patch" name="_method">
        <div class="row">
            <div class="col-xs-12 col-lg-6 form-group">
                <label for="album-artist">Album Artist: </label>
                <select name="album-artist" id="album-artist" class="form-control" required>
                    <option value="" selected disabled>Select Artist</option>
                    @if($artists)
                        @if(old('album-artist'))
                            @foreach($artists as $artist)
                                @if((int) old('album-artist') === $artist->id)
                                    <option value="{{ $artist->id }}" selected>{{ $artist->nick_name }}</option>
                                @else
                                    <option value="{{ $artist->id }}">{{ $artist->nick_name }}</option>
                                @endif
                            @endforeach
                        @else
                            @foreach($artists as $artist)
                                @if($album->artist_id === $artist->id)
                                    <option value="{{ $artist->id }}" selected>{{ $artist->nick_name }}</option>
                                @else
                                    <option value="{{ $artist->id }}">{{ $artist->nick_name }}</option>
                                @endif
                            @endforeach
                        @endif
                    @endif
                </select>
            </div>

            <div class="col-xs-12 col-lg-6 form-group">
                <label for="album-title">Album Name:</label>
                <input type="text" class="form-control" name="album-title" id="album-title" placeholder="title..."
                       required value="{{ old('album-title') ?? $album->name }}">
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-lg-6 form-group">
                <label for="album-name">Album Release Date:</label>
                <input type="text" class="form-control" name="album-release-date" id="album-release-date"
                       placeholder="YYYY-MM-DD" value="{{ old('album-release-date') ?? $album->release_date }}"
                       required>
            </div>

            <div class="col-xs-12 col-lg-6 form-group">
                <label for="album-record-label">Record Label: </label>
                <select name="album-record-label" id="album-record-label" class="form-control">
                    <option value="" selected disabled>Select Record Label</option>
                    @if($labels)
                        @if(old('album-record-label'))
                            @foreach($labels as $label)
                                @if((int) old('album-record-label') === $label->id)
                                    <option value="{{ $label->id }}" selected>{{ $label->name }}</option>
                                @else
                                    <option value="{{ $label->id }}">{{ $label->name }}</option>
                                @endif
                            @endforeach
                        @else
                            @foreach($labels as $label)
                                @if($album->label_id === $label->id)
                                    <option value="{{ $label->id }}" selected>{{ $label->name }}</option>
                                @else
                                    <option value="{{ $label->id }}">{{ $label->name }}</option>
                                @endif
                            @endforeach
                        @endif
                    @endif
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 form-group">
                <label for="album-art">Album Art:</label>
                <input type="file" class="form-control filestyle" name="album-art" id="album-art"
                       data-buttonName="btn btn-black btn-outline">
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-lg-6 form-group"></div>

            <div class="col-xs-12 col-lg-6 form-group">
                <label for=""><br></label>
                <input type="submit" class="form-control btn btn-black btn-outline" name="submit-album" id="submit-album"
                       value="save">
            </div>
        </div>
    </form>
@endsection