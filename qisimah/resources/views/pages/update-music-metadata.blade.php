@extends('layouts.file')

@section('fileType')

    music metadata

@endsection

@section('form')
    {{--{{ dd($song->genres->contains('id', 1)) }}--}}
    @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif
    <form action="{{url('songs/'.$song->id)}}" id="song-updater" class="row"
          method="post"
          enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="put">
        <input type="hidden" value="{{ $file_id ?? '' }}" name="file_id">
        <div class="row">
            <div class="form-group col-xs-12 col-md-6">
                <label for="song-title">Title: </label>
                <input name="song-title" type="text" class="form-control" id="song-title" placeholder="song title"
                       value="{{ old('song-title') ?? $song->title }}">
            </div>

            <div class="form-group col-xs-12 col-md-6">
                <label for="song-version">Version: </label>
                <select name="song-version" id="song-version" class="form-control" disabled>
                    @if(old('song-version'))
                        <option value="original" {{ ( old('song-version') === 'original')? 'selected' : '' }}>
                            Original
                        </option>
                        <option value="remix" {{ ( old('song-version') === 'remix')? 'selected' : '' }}>
                            Remix
                        </option>
                        <option value="cover" {{ (old('song-version') === 'cover')? 'selected' : '' }}>
                            Cover
                        </option>
                    @else
                        <option value="original" {{ ( $song->version === 'original')? 'selected' : '' }}>
                            Original
                        </option>
                        <option value="remix" {{ ( $song->version === 'remix')? 'selected' : '' }}>
                            Remix
                        </option>
                        <option value="cover" {{ ($song->version === 'cover')? 'selected' : '' }}>
                            Cover
                        </option>
                    @endif
                </select>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-xs-12 col-md-6">
                <label for="song-artist">Artist: </label>
                <select name="song-artist" id="song-artist" class="form-control" size="4">
                    <option value="" disabled>Select Artist</option>
                    @if($artists)
                        @foreach($artists as $artist)
                            <option value="{{ $artist->id }}" {{ ($song->artist_id == $artist->id)? 'selected' : '' }}>
                                {{ $artist->nick_name }}
                            </option>
                        @endforeach
                    @endif
                </select>
            </div>

            <div class="form-group col-xs-12 col-md-6">
                <label for="song-featured-artists">Featured Artist: </label>
                <select name="song-featured-artists[]" id="song-featured-artists" class="form-control" multiple>
                    <option value="" disabled>Select Featured Artist</option>
                    @if($artists)
                        @if(is_array(old('song-featured-artists')))
                            @foreach($artists as $artist)
                                @if($song->artists->pluck('id')->contains('id', (int) $artist->id))
                                    <option value="{{ $artist->id }}" selected>{{ $artist->nick_name }}</option>
                                @else
                                    <option value="{{ $artist->id }}">{{ $artist->nick_name }}</option>
                                @endif
                            @endforeach
                        @else
                            @foreach($artists as $artist)
                                @if($song->artists->contains('id', $artist->id))
                                    <option value="{{ $artist->id }}" selected>{{ $artist->nick_name }}</option>
                                @else
                                    <option value="{{ $artist->id }}">{{ $artist->nick_name }}</option>
                                @endif
                            @endforeach
                        @endif
                    @endif
                </select>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-xs-12 col-md-6">
                <label for="song-genres">Genre: </label>
                <select name="song-genres[]" id="song-genres" class="form-control" multiple>
                    <option value="" disabled="true">Select Genre</option>
                    @if($genres)
                        @if(is_array(old('song-genres')))
                            @foreach($genres as $genre)
                                @if($song->genres->contains('id', (int) $genre->id))
                                    <option value="{{ $genre->id }}" selected>{{ $genre->name }}</option>
                                @else
                                    <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                                @endif
                            @endforeach
                        @else
                            @foreach($genres as $genre)
                                @if($song->genres->contains('id', (int) $genre->id))
                                    <option value="{{ $genre->id }}" selected>{{ $genre->name }}</option>
                                @else
                                    <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                                @endif
                            @endforeach
                        @endif
                    @endif
                </select>
            </div>

            <div class="form-group col-xs-12 col-md-6">
                <label for="song-producers">Produced by: </label>
                <select name="song-producers[]" id="song-producers" class="form-control" multiple>
                    <option value="" disabled="true">Select Producers</option>
                    @if($producers)
                        @if(is_array(old('song-producers')))
                            @foreach($producers as $producer)
                                @if(in_array($producer->q_id, old('song-producers')))
                                    <option value="{{ $producer->q_id }}" selected>{{ $producer->nick_name }}</option>
                                @else
                                    <option value="{{ $producer->q_id }}">{{ $producer->nick_name }}</option>
                                @endif
                            @endforeach
                        @else
                            @foreach($producers as $producer)
                                @if(in_array($producer->q_id, $song->producers->pluck('q_id')->toArray()))
                                    <option value="{{ $producer->q_id }}" selected>{{ $producer->nick_name }}</option>
                                @else
                                    <option value="{{ $producer->q_id }}">{{ $producer->nick_name }}</option>
                                @endif
                            @endforeach
                        @endif
                    @endif
                </select>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-xs-12 col-md-6">
                <label for="song-album">Album: </label>
                <select name="song-album" id="song-album" class="form-control">
                    @if($albums)
                        @if(old('song-album'))
                            @foreach($albums as $album)
                                @if( (int) old('song-album') === $album->id)
                                    <option value="{{ $album->id }}" selected>{{ $album->name }}</option>
                                @else
                                    <option value="{{ $album->id }}">{{ $album->name }}</option>
                                @endif
                            @endforeach
                        @else
                            @foreach($albums as $album)
                                @if( (int) $song->album_id === $album->id)
                                    <option value="{{ $album->id }}" selected>{{ $album->name }}</option>
                                @else
                                    <option value="{{ $album->id }}">{{ $album->name }}</option>
                                @endif
                            @endforeach
                        @endif
                </select>
            </div>

            <div class="form-group col-xs-12 col-md-6">
                <label for="song-art">Promo Art: </label>
                <input name="song-art" type="file" class="form-control filestyle" data-buttonName="btn btn-black
                btn-outline" id="song-art" placeholder="song title" value="{{ old('song-art') }}">
            </div>
        </div>

        <div class="row">
            <div class="form-group col-xs-12 col-md-6">
                <label for="song-label">Label: </label>
                <select name="song-label" id="song-label" class="form-control">
                    <option value="">Select Record Label</option>
                    @if($labels)
                        @foreach($labels as $label)
                            <option value="{{ $label->id }}" {{ ($song->label == $label->id)? 'selected' : '' }}>
                                {{ $label->nick_name }}
                            </option>
                        @endforeach
                    @endif
                </select>
            </div>

            <div class="form-group col-xs-12 col-md-6">
                <label for="song-release-date">Release Date: </label>
                <input name="song-release-date" type="text" class="form-control" id="song-release-date"
                       value="{{ old('song-release-date') ?? $song->release_date }}">
            </div>
        </div>

        <div class="row">
            <div class="form-group col-xs-12 col-md-6"></div>
            <div class="form-group col-xs-12 col-md-6">
                <label for="song-title"><br></label>
                <button class="btn btn-black btn-block">save</button>
            </div>
        </div>
    </form>
    {{--<script src="{{ asset('js/dropzone.js') }}"></script>--}}
@endsection