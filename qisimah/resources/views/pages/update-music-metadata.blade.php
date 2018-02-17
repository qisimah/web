@extends('layouts.file')

@section('fileType')
    music metadata
@endsection

@section('form')
    @if($errors->any())
        <br>
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
                <select name="song-version" id="song-version" class="form-control chosen-select" disabled>
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
                <select name="song-artist" id="song-artist" class="form-control chosen-select">
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
                <select name="song-featured-artists[]" id="song-featured-artists" class="form-control chosen-select"
                        multiple size="1">
                    <option value="" disabled>Select Featured Artist</option>
                    @if($artists)
                        @if(is_array(old('song-featured-artists')))
                            @foreach($features as $feature)
                                @if($song->artists->pluck('id')->contains('id', (int) $feature->id))
                                    <option value="{{ $feature->id }}" selected>{{ $feature->nick_name }}</option>
                                @else
                                    <option value="{{ $feature->id }}">{{ $feature->nick_name }}</option>
                                @endif
                            @endforeach
                        @else
                            @foreach($features as $feature)
                                @if($song->artists->contains('id', $feature->id))
                                    <option value="{{ $feature->id }}" selected>{{ $feature->nick_name }}</option>
                                @else
                                    <option value="{{ $feature->id }}">{{ $feature->nick_name }}</option>
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
                <select name="song-genres[]" id="song-genres" class="form-control chosen-select" multiple size="1">
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
                <select name="song-producers[]" id="song-producers" class="form-control chosen-select" multiple
                        size="1">
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
                <select name="song-album" id="song-album" class="form-control chosen-select">
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
                <select name="song-label" id="song-label" class="form-control chosen-select">
                    <option value="">Select Record Label</option>
                    @if($labels)
                        @if(old('song-label'))
                            @foreach($labels as $label)
                                @if($label->contains('id', (int) old('song-label')))
                                    <option value="{{ $label->id }}" selected>{{ $label->name }}</option>
                                @else
                                    <option value="{{ $label->id }}">{{ $label->name }}</option>
                                @endif
                            @endforeach
                        @else
                            @foreach($labels as $label)
                                @if($song->label_id == $label->id)
                                    <option value="{{ $label->id }}" selected>{{ $label->name }}</option>
                                @else
                                    <option value="{{ $label->id }}">{{ $label->name }}</option>
                                @endif
                            @endforeach
                        @endif
                    @endif
                </select>
            </div>

            <div class="form-group col-xs-12 col-md-6 input-daterange" data-date-format="yyyy-mm-dd"
                 data-provide="datepicker">
                <label for="song-release-date">Release Date: </label>
                <input name="song-release-date" type="text" class="form-control datepicker" id="song-release-date"
                       value="{{ old('song-release-date') ?? $song->release_date }}">
            </div>
        </div>

        <div class="row">
            <div class="form-group col-xs-12 col-md-6">
                @if($user->type === 'admin')
                    <label for="song-review">Review:</label>
                    <select name="song-review" id="song-review" class="form-control chosen-select"
                            {{ ($song->indexed != 0)? 'disabled' : '' }}>
                        <option value="0" disabled>pending</option>
                        <option value="2" {{ ($song->indexed == 2)? 'selected' : '' }}>
                            @if(in_array($song->indexed, [1, 2]))
                                approved
                            @else
                                approve
                            @endif
                        </option>
                        <option value="3" {{ ($song->indexed == 3)? 'selected' : '' }}>
                            {{ ($song->indexed == 3)? 'declined' : 'decline' }}
                        </option>
                    </select>
                @endif
            </div>

            <div class="form-group col-xs-12 col-md-6">
                <label for="song-title"><br></label>
                <button id="update-song-button" class="btn btn-black btn-block" onclick="(function handleUpdateClick
                () {
                document.getElementById('update-song-button').innerText = 'updating...';
                document.getElementById('update-song-button').setAttribute('disabled', 'disabled');
                document.getElementById('song-updater').submit();
                        }())">update</button>
            </div>
        </div>
    </form>
@endsection