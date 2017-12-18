@extends('layouts.master')@section('title')    Broadcasters@endsection@section('content')    {{--Broadcaster Form--}}    <div id="frmBroadcaster" tabindex="-1" role="dialog" aria-labelledby="modalWithForm" class="modal fade">        <div role="document" class="modal-dialog modal-lg">            <div class="modal-content">                <form action="/file/create/song" method="post" id="frmSaveBroadcaster" class="form-horizontal"                      onsubmit="">                    <div class="modal-header bg-black">                        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span                                    aria-hidden="true">×</span></button>                        <h4 id="fileEditorTitle" class="modal-title">Add New Broadcaster</h4>                    </div>                    <div class="modal-body">                        <div class="row">                            <div class="col-md-6">                                <div class="form-group has-feedback">                                    <div class="col-sm-12">                                        <label for="txtBroadcasterName" class="control-label">Name: *</label>                                    </div>                                    <div class="col-sm-12">                                        <input id="txtBroadcasterName" name="txtBroadcasterName" type="text"                                               class="form-control" placeholder="broadcaster name" minlength="3"                                               maxlength="20" required>                                    </div>                                </div>                            </div>                            <div class="col-md-6">                                <div class="form-group has-feedback">                                    <div class="col-sm-12">                                        <label for="txtFrequency" class="control-label">Frequency: * </label>                                    </div>                                    <div class="col-sm-12">                                        <input type="text" id="txtFrequency" name="txtFrequency" class="form-control"                                               placeholder="123.45" minlength="4" maxlength="6" required>                                    </div>                                </div>                            </div>                        </div>                        <div class="row">                            <div class="col-md-6">                                <div class="form-group has-feedback">                                    <div class="col-sm-12">                                        <label for="selCountry" class="control-label">Country: *</label>                                    </div>                                    <div class="col-sm-12">                                        <select name="selCountry" id="selCountry" class="form-control chosen-select"                                                size="8" required>                                            <option value="" disabled>Select Country</option>                                        </select>                                    </div>                                </div>                            </div>                            <div class="col-md-6">                                <div class="form-group has-feedback">                                    <div class="col-sm-12">                                        <label for="selRegion" class="control-label">Region: *</label>                                    </div>                                    <div class="col-sm-12">                                        <select name="selRegion" id="selRegion" class="form-control chosen-select"                                                size="8" required>                                            <option value="" disabled>Select Region</option>                                        </select>                                    </div>                                </div>                            </div>                        </div>                        <div class="row">                            <div class="col-md-6">                                <div class="form-group has-feedback">                                    <div class="col-sm-12">                                        <label for="txtCity" class="control-label">City: *</label>                                    </div>                                    <div class="col-sm-12">                                        <input type="text" id="txtCity" class="form-control" minlength="2"                                               maxlength="30" required>                                    </div>                                </div>                            </div>                            <div class="col-md-6">                                <div class="form-group has-feedback">                                    <div class="col-sm-12">                                        <label for="txtAddress" class="control-label">Address: </label>                                    </div>                                    <div class="col-sm-12">                                        <input type="text" id="txtAddress" class="form-control" minlength="5"                                               maxlength="50">                                    </div>                                </div>                            </div>                        </div>                        <div class="row">                            <div class="col-md-6">                                <div class="form-group has-feedback">                                    <div class="col-sm-12">                                        <label for="txtPhone" class="control-label">Phone: </label>                                    </div>                                    <div class="col-sm-12">                                        <input type="tel" id="txtPhone" class="form-control" placeholder="Telephone..."                                               minlength="10">                                    </div>                                </div>                            </div>                            <div class="col-md-6">                                <div class="form-group has-feedback">                                    <div class="col-sm-12">                                        <label for="txtStreamId" class="control-label">Stream ID: </label>                                    </div>                                    <div class="col-sm-12">                                        <input type="number" id="txtStreamId" class="form-control"                                               placeholder="Stream ID..." minlength="5">                                    </div>                                </div>                            </div>                        </div>                        <div class="row">                            <div class="col-md-6">                                <div class="form-group has-feedback">                                    <div class="col-sm-12">                                        <label for="selTags" class="control-label">Tags: *</label>                                    </div>                                    <div class="col-sm-12">                                        <select name="selTags" id="selTags" class="form-control chosen-select" multiple                                                required>                                            <option value="" disabled="">Select Tags</option>                                        </select>                                    </div>                                </div>                            </div>                            <div class="col-md-6">                                <div class="form-group has-feedback">                                    <div class="col-sm-12">                                        <label for="txtTagLine" class="control-label">Tagline:</label>                                    </div>                                    <div class="col-sm-12">                                        <input id="txtTagLine" name="txtTagLine" type="text" class="form-control"                                               placeholder="tag line..." minlength="5">                                    </div>                                </div>                            </div>                        </div>                        <div class="row">                            <div class="col-md-12">                                <div class="form-group has-feedback">                                    <div class="col-sm-12">                                        <label for="txtLogo" class="control-label">Logo:</label>                                    </div>                                    <div id="dvUploadLogo" data-img-url="" data-storage-id="" class="col-sm-12">                                        <input id="txtLogo" name="txtLogo" type="file" class="form-control filestyle"                                               data-buttonText="Select Logo" data-buttonName="btn btn-black btn-outline"                                               data-placeholder="no image selected">                                    </div>                                </div>                            </div>                        </div>                    </div>                    <div class="modal-footer">                        <button type="button" data-dismiss="modal" class="btn btn-outline btn-default">Cancel</button>                        <button id="btnSaveBroadcaster" type="submit" class="btn btn-black" data-record-id="">Save                        </button>                    </div>                </form>            </div>        </div>    </div>    {{--Broadcaster Form--}}    <div class="page-content container-fluid">        @unless($user['type'] !== 'admin')            <div class="row">                <div class="form-group col-xs-12 col-md-3 pull-right">                    <a href="{{route('broadcaster.create')}}" id="add-broadcaster"                       class="form-control btn btn-outline btn-primary">add broadcaster</a>                </div>            </div>        @endunless        <div class="widget">            <div class="widget-body table-responsive">                <table id="" style="width: 100%" class="table table-hover dt-responsive nowrap">                    <thead>                    <tr>                        <th class="text-center">                            <div class="checkbox-custom">                                <input id="checkAll" type="checkbox" value="option1">                                <label for="checkAll" class="pl-0">&nbsp</label>                            </div>                        </th>                        <th>Logo</th>                        <th>Name</th>                        <th class="text-center">Location</th>                        {{--<th class="text-center">Reach</th>--}}                        <th class="text-center">Status</th>                        <th class="text-center">Action</th>                    </tr>                    </thead>                    <tbody>                    @foreach($broadcasters as $broadcaster)                        <tr>                            <td class="text-center">                                <div class="checkbox-custom">                                    <input id="product-02" type="checkbox" value="02">                                    <label for="product-02" class="pl-0">&nbsp;</label>                                </div>                            </td>                            <td class=""><img src="{{asset($broadcaster->img)}}" width="50" alt=""                                              class="img-thumbnail img-responsive"></td>                            <td>{{$broadcaster->name}}</td>                            <td class="text-center">{{$broadcaster->city}}, {{$broadcaster->country->name}}</td>                            {{--<td class="text-center">{{$broadcaster['reach']}}</td>--}}                            <td class="text-center">                                <span class="label label-outline label-danger">not listening</span>                            </td>                            <td class="text-center">                                <div role="group" aria-label="Basic example" class="btn-group btn-group-sm">                                    <a href="Reports-broadcaster-Qisimah.html"                                       class="btn btn-outline btn-primary"                                       data-content="{{$broadcaster['id']}}"><i class="ti-eye"></i></a>                                    <a href="{{route('broadcaster.edit', $broadcaster)}}"                                       class="btn btn-outline btn-success"                                       data-content="{{$broadcaster['id']}}"><i class="ti-pencil"></i></a>                                    @unless($user['type'] !== 'admin')                                        <a class="btn btn-outline btn-danger delete-broadcaster"                                           data-content="{{$broadcaster['id']}}"                                           data-name="{{$broadcaster['name']}}"><i class="ti-trash"></i></a>                                    @endunless                                    <a class="btn btn-outline btn-info listen"                                       data-content="{{$broadcaster['id']}}"><i class="ti-volume"></i></a>                                </div>                            </td>                        </tr>                    @endforeach                    @foreach($listening as $broadcaster)                        <tr data-content="">                            <td class="text-center">                                <div class="checkbox-custom">                                    <input id="product-02" type="checkbox" value="02">                                    <label for="product-02" class="pl-0">&nbsp;</label>                                </div>                            </td>                            <td class=""><img src="{{asset($broadcaster['img'])}}" width="50" alt=""                                              class="img-thumbnail img-responsive"></td>                            <td>{{$broadcaster['name']}}</td>                            <td class="text-center">{{$broadcaster['city']}}                                , {{$broadcaster['country_id']}}</td>                            <td class="text-center">{{$broadcaster['city']}}, {{$broadcaster->country->name}}</td>                            {{--<td class="text-center">{{$broadcaster['reach']}}</td>--}}                            <td class="text-center"><span                                        class="label label-outline label-success">listening</span></td>                            <td class="text-center">                                <div role="group" aria-label="Basic example" class="btn-group btn-group-sm">                                    <a href="Reports-broadcaster-Qisimah.html"                                       class="btn btn-outline btn-primary"                                       data-content="{{$broadcaster['id']}}"><i class="ti-eye"></i></a>                                    <a href="{{route('broadcaster.edit', $broadcaster)}}"                                       class="btn btn-outline btn-success"                                       data-content="{{$broadcaster['id']}}"><i class="ti-pencil"></i></a>                                    @unless($user['role'] === 'admin')                                        <a class="btn btn-outline btn-danger delete-broadcaster"                                           data-content="{{$broadcaster['id']}}"><i class="ti-trash"></i></a>                                    @endunless                                    <a class="btn btn-outline btn-danger listen"                                       data-content="{{$broadcaster['id']}}"                                       data-user="{{$broadcaster['user_id']}}"><i class="ti-volume"></i></a>                                </div>                            </td>                        </tr>                    @endforeach                    </tbody>                </table>                {{ $broadcasters->links() }}            </div>        </div>@endsection