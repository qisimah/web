@extends('layouts.file')
@section('fileType')
    upload new ad
@endsection
@section('form')
    <form id="upload-form" method="post" action="/file/create" enctype="multipart/form-data">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group has-feedback">
                    <label for="title">ad title: *</label>
                    <input type="text" name="title" id="ad-title" class="form-control isValid" placeholder="enter ad title" required>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group has-feedback">
                    <label for="owner">ad owner: *</label>
                    <input id="ad-name" type="text" name="ad-name" class="form-control isValid" placeholder="enter ad name" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group">
                    <label for="img">ad flier:</label>
                    <input type="file" name="img" id="img" class="form-control filestyle" data-buttonText="Select flier" data-buttonName="btn btn-primary btn-outline" data-placeholder="no flier selected" required>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group">
                    <label for="audio">ad audio: *</label>
                    <input type="file" name="audio" id="audio" class="form-control filestyle" data-buttonText="Select audio" data-buttonName="btn btn-primary btn-outline" data-placeholder="no audio selected" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-lg-offset-6">
                <button id="upload-ad" class="form-control btn btn-primary btn-outline">upload ad</button>
            </div>
        </div>
    </form>
    <div id="upload-opt" class="row" hidden>
        <div class="col-md-6">
            <a href="/file" class="btn btn-outline btn-primary">view files</a>
            @if($user['type'] === 'advertiser' || $user['type'] === 'ad-agency')
                <a href="/file/create/ad" class="btn btn-primary">upload another file</a>
            @elseif($user['type'] === 'artist' || $user['type'] === 'artist-manager')
                <a href="/file/create/song" class="btn btn-primary">upload another file</a>
            @elseif($user['type'] === 'admin')
                <a href="/file/create/ad" class="btn btn-primary">upload ad</a>
                <a href="/file/create/song" class="btn btn-primary">upload song</a>
            @endif
        </div>
    </div>
@endsection