@extends('layouts.master')
@section('title')
    My Library
@endsection
@section('content')
    {{--Content Update Modal--}}
    <div tabindex="-1" role="dialog" aria-labelledby="modalWithForm" class="modal fade bs-example-modal-form">
        <div role="document" class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-black">
                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                    <h4 id="fileEditorTitle" class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <form action="/file/create/song" method="post" id="frmSongUpload" class="form-horizontal">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group has-feedback">
                                    <div class="col-sm-12">
                                        <label for="txtSongTitle" class="control-label">Song Title: *</label>
                                    </div>
                                    <div class="col-sm-12">
                                        <input id="txtSongTitle" name="txtSongTitle" type="text" class="form-control isValid" placeholder="type song title..." required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group has-feedback">
                                    <div class="col-sm-12">
                                        <label for="selArtists" class="control-label">Artist: * </label>
                                    </div>
                                    <div class="col-sm-12">
                                        <select name="selArtist" id="selArtist" class="form-control chosen-select isValid" size="8">

                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group has-feedback">
                                    <div class="col-sm-12">
                                        <label for="selGenre" class="control-label">Genre: *</label>
                                    </div>
                                    <div class="col-sm-12">
                                        <select name="selGenre" id="selGenre" class="form-control chosen-select isValid" size="8" multiple="multiple" required>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group has-feedback">
                                    <div class="col-sm-12">
                                        <label for="selArtists" class="control-label">Featured:</label>
                                    </div>
                                    <div class="col-sm-12">
                                        <select name="selArtists" id="selArtists" class="form-control chosen-select isValid" size="8" multiple="multiple">

                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group has-feedback">
                                    <div class="col-sm-12">
                                        <label for="selProducers" class="control-label">Producers: *</label>
                                    </div>
                                    <div class="col-sm-12">
                                        <select name="selProducers" id="selProducers" class="form-control chosen-select isValid" size="8" multiple="multiple" required>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group has-feedback">
                                    <div class="col-sm-12">
                                        <label for="txtReleaseDate" class="control-label">Release Date: *</label>
                                    </div>
                                    <div class="col-sm-12">
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
                                    <div class="col-sm-12">
                                        <label for="txtRecordLabel" class="control-label">Record Label:</label>
                                    </div>
                                    <div class="col-sm-12">
                                        <input id="txtRecordLabel" name="txtRecordLabel" type="text" class="form-control" placeholder="type label...">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group has-feedback">
                                    <div class="col-sm-12">
                                        <label for="txtAudioFile" class="control-label">Album:</label>
                                    </div>
                                    <div class="col-sm-12">
                                        <input id="txtAlbum" name="txtAlbum" type="text" class="form-control" placeholder="type album name...">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group has-feedback">
                                    <div class="col-sm-12">
                                        <label for="txtPromoArt" class="control-label">Promo Art:</label>
                                    </div>
                                    <div id="dvUploadImg" data-img-url="" data-storage-id="" class="col-sm-12">
                                        <input id="txtPromoArt" name="txtPromoArt" type="file" class="form-control filestyle" data-buttonText="Select Promo Art" data-buttonName="btn btn-black btn-outline" data-placeholder="no image selected">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-outline btn-default">Cancel</button>
                    <button id="btnUpdateFile" type="button" class="btn btn-black" data-record-id="">Update</button>
                </div>
            </div>
        </div>
    </div>
    {{--Content Update Modal--}}
    {{--Content Details Modal--}}
    <div id="mdlContentDetails" tabindex="-1" role="dialog" aria-labelledby="modalWithForm" class="modal fade">
        <div role="document" class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-black">
                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                    <h4 id="fileEditorTitle" class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="widget no-border">
                                <div style="height: 300px" class="overlay-container overlay-color"><img id="imgContentImg" width="100%" src="" alt="" class="img-responsive"></div>
                                <!--<div style="position: relative" class="text-center"><a href="#" style="position: absolute; top: -250px; left: 190px; margin-left: -50px; border-radius: 0%; padding: 3px;"><img src="../build/images/backgrounds/taking-over.jpg" width="200" alt="" class=""></a></div>-->
                                <div class="row row-0 p-15 text-center bg-black">
                                    <div class="col-xs-6">
                                        <div id="dvTotalPlays" class="fs-30 fw-500">0</div>
                                        <div class="text-muted">Total Plays</div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="fs-30 fw-500">#<span id="dvAirtimeRank"></span></div>
                                        <div class="text-muted">Airplay Chart Rank</div>
                                    </div>
                                    <!--<div class="col-xs-4">
                                      <div class="fs-20 fw-500">95</div>
                                      <div class="text-muted">Photos</div>
                                    </div>-->
                                </div>
                                <div class="text-center p-20 bd-l bd-r" style="height:auto;">
                                    <h2 class="bg-light mt-20 mb-5"><b id="bContentTitle">Title</b></h2>
                                    <p><b><span id="spnArtist">Artist</span></b></p>
                                    <div>
                                        <div class="col-md-7 col-xs-12 text-left">
                                            <p><b>Featured:</b> <span id="spnFeatured"></span></p>
                                            <p><b>Producers:</b> <span id="spnProducers"></span></p>
                                            <p><b>Genres:</b> <span id="spnGenres"></span></p>
                                            <p><b>1st Play:</b> <span id="spnFrstPlay"></span></p>
                                        </div>
                                        <div class="col-md-5 col-xs-12 text-left">
                                            <p><b>Album:</b> <span id="spnAlbum"></span></p>
                                            <p><b>Label:</b> <span id="spnLabel"></span></p>
                                            <p><b>Released Year:</b> <span id="spnReleaseYear"></span></p>
                                            <p><b>Recent Play:</b> <span id="spnRecentPlay"></span></p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-black">Seen</button>
                </div>
            </div>
        </div>
    </div>
    {{--Content Details Modal--}}
    <div class="page-content container-fluid">
        <div class="widget">
            <div class="widget-heading">
                <h3 class="widget-title">
                    @if($user['type'] <> 'admin')
                    <a href="/file/create/{{($user['type'] === 'advertiser' || $user['type'] === 'ad-agency')? 'ad' : 'song'}}" class="btn btn-outline btn-primary">
                        <i class="ti-plus mr-5"></i>
                        Add New Content
                    </a>
                        @else
                        files
                    @endif
                </h3>
            </div>
            <div class="widget-body table-responsive">
                <table id="files" class="table datatables table-hover table-condensed table-bordered">
                    <thead>
                    <tr>
                        <th class="text-center">
                            <div class="checkbox-custom">
                                <input id="checkAll" type="checkbox" value="option1">
                                <label for="checkAll" class="pl-0">&nbsp;</label>
                            </div>
                        </th>
                        <th class="text-center">Image</th>
                        <th class="text-center title">Title</th>
                        <th class="text-center">Artist</th>
                        @if($user['role'] === 'master' || $user['role'] === 'seer' || $user['type'] === 'artist' || $user['type'] === 'record-label')
                        <th class="text-center">Uploader</th>
                        @endif
                        <th class="text-center">Date Uploaded</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @unless($files)
                        @if($user['type'] <> 'admin')
                    <tr>
                        <td class="text-center" colspan="9">
                            <a href="/file/create{{($user['type'] <> 'artist')? 'ad' : 'song'}}" class="btn btn-outline btn-info">Let's upload your first audio</a>
                        </td>

                    </tr>
                    @endif
                    @endunless
                    @foreach($files as $file)
                    <tr>
                        <td class="text-center">
                            <div class="checkbox-custom">
                                <input id="{{$file['id']}}" data-storage-id="{{$file['f_storage_id']}}" type="checkbox" value="02" class="chkContents">
                                <label for="{{$file['id']}}" class="pl-0">&nbsp</label>
                            </div>
                        </td>
                        <td class=""><img src="{{$file['img']}}" width="50" alt="" class="img-thumbnail img-responsive"></td>
                        <td class="text-center title">{{$file['title']}}</td>
                        <td class="text-right">
                            @if(isset($file['artist']))
                                {{$file['artist']['nick_name']}}<br>
                            @endif
                            @if(isset($file['artists']))
                                @foreach($file['artists'] as $artist)
                                    {{$artist->nick_name}}<br>
                                @endforeach
                            @endif
                        </td>
                        @if($user['role'] === 'master' || $user['role'] === 'seer' || $user['type'] === 'artist' || $user['type'] === 'record-label')
                        <td class="text-right">{{$file['first_name']}}<br>{{$file['last_name']}}</td>
                        @endif
                        <td class="text-center">{{Carbon\Carbon::parse($file['created_at'])->diffForHumans()}}</td>
                        <?php
                        if($file['indexed'] == 0){
                        	$class = 'label-danger';
                            $status = 'Pending';
                        } elseif ($file['indexed'] == 2){
                        	$class = 'label-warning';
                        	$status = 'Indexing';
                        } elseif ($file['indexed'] == 1) {
                        	$class = 'label-success';
						    $status = 'Ready';
                        }
                        ?>
                        <td class="text-center"><span class="label label-outline {{$class}}">{{$status}}</span></td>
                        <td class="text-center">
                            <div role="group" aria-label="Basic example" class="btn-group btn-group-sm col-sm-12">
                                <a type="button" class="btn btn-outline btn-primary content-details col-sm-4" data-record-id="{{$file['id']}}" href="#"><i class="ti-eye"></i></a>
                                <a href="{{url('/file/'.$file['id'].'/edit')}}" data-record-id="{{$file['id']}}" data-storage-id="{{$file['f_storage_id']}}" type="button" class="btn btn-outline btn-success update-content col-sm-4"><i class="ti-pencil"></i></a>
                                <a href="{{url('/file/'.$file['id'])}}" data-record-id="{{$file['id']}}" data-storage-id="{{$file['f_storage_id']}}" type="button" class="btn btn-outline btn-danger delete-content col-sm-4"><i class="ti-trash"></i></a>
                            </div>
                        </td>
                    </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection