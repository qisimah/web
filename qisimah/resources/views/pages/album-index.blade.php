@extends('layouts.master')
@section('title')
    Albums <a href="{{ route('albums.create') }}" class="btn btn-black btn-outline">add new album</a>
@endsection
@section('content')
    <br>
    @if(session('success'))
        <div class="alert alert-success col-sm-10 col-sm-offset-1">
            <p class="text-center">
                {{ session('success') }}
            </p>
        </div>
    @elseif(session('error'))
        <div class="alert alert-danger col-sm-10 col-sm-offset-1">
            <p class="text-center">
                {{ session('error') }}
            </p>
        </div>
    @endif
    <div class="row">
        @if($albums->count() === 0)
            <div class="col-sm-12">
                <p class="text-center"> There are no albums at the moment!</p>
            </div>
        @else
            @foreach($albums as $album)
                <div class="media-left col-xs-12 col-md-3">
                    <div class="widget">
                        <div style="height: 100px" class="overlay-container overlay-color"><img
                                    src="{{asset($album->img)}}" alt="" class="overlay-bg img-responsive">
                        </div>
                        <div style="position: relative"><a href="#"
                                                           style="position: absolute; top: -70px; left: 50%; margin-left: -50px; border-radius: 50%; padding: 3px; background-color: #FFF"><img
                                        src="{{asset($album->img)}}" width="100" alt=""
                                        class="img-circle"></a></div>
                        <div class="text-center p-20 bd-l bd-r">
                            <h4 class="widget-title mt-30 mb-5">{{ $album->name }}</h4>
                            <p>{{ $album->artist->nick_name ?? 'Qisimah' }} / {{ $album->release_date }}</p>
                        </div>
                        <div class="row row-0 p-15 text-center bg-black">
                            <div class="col-xs-4" style="margin-top: 8px">
                                <form action="{{ route('albums.destroy', $album) }}" method="post">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger btn-outline delete-album">
                                        <i class="ti-trash fs-30"></i>
                                    </button>
                                </form>
                            </div>
                            <div class="col-xs-4">
                                <div class="fs-20 fw-500">{{ $album->files->count() }}</div>
                                <div class="text-muted">Tracks</div>
                            </div>
                            <div class="col-xs-4" style="margin-top: 8px">
                                <a href="{{ route('albums.edit', $album) }}" class="btn btn-primary
                                btn-outline">
                                    <i class="ti-pencil fs-30"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
@endsection