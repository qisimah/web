@extends('layouts.master')
@section('title')
    Broadcasters
@endsection
@section('content')
    <div class="page-content container-fluid">
        @unless($user['type'] !== 'admin')
        <div class="row">
            <div class="form-group col-xs-12 col-md-3 pull-right">
                <a href="{{route('broadcaster.create')}}" id="add-broadcaster" class="form-control btn btn-outline btn-primary">add broadcaster</a>
            </div>
        </div>
        @endunless
        <div class="widget">
            <div class="widget-body">
                <table id="broadcasters" style="width: 100%" class="table table-hover dt-responsive nowrap">
                    <thead>
                        <tr>
                            <th class="text-center">
                                <div class="checkbox-custom">
                                    <input id="checkAll" type="checkbox" value="option1">
                                    <label for="checkAll" class="pl-0">&nbsp</label>
                                </div>
                            </th>
                            <th>Logo</th>
                            <th>Name</th>
                            <th class="text-center">Location</th>
                            <th class="text-center">Reach</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($listen as $broadcaster)
                            <tr>
                                <td class="text-center">
                                    <div class="checkbox-custom">
                                        <input id="product-02" type="checkbox" value="02">
                                        <label for="product-02" class="pl-0">&nbsp;</label>
                                    </div>
                                </td>
                                <td class=""><img src="{{asset($broadcaster['img'])}}" width="50" alt="" class="img-thumbnail img-responsive"></td>
                                <td>{{$broadcaster['name']}}</td>
                                <td class="text-center">{{$broadcaster['city']}}, {{$broadcaster['country']}}</td>
                                <td class="text-center">{{$broadcaster['reach']}}</td>
                                <td class="text-center"><span class="label label-outline label-danger">not listening</span></td>
                                <td class="text-center">
                                    <div role="group" aria-label="Basic example" class="btn-group btn-group-sm">
                                        <a href="Reports-broadcaster-Qisimah.html" class="btn btn-outline btn-primary" data-content="{{$broadcaster['id']}}"><i class="ti-eye"></i></a>
                                        <a href="{{route('broadcaster.edit', $broadcaster)}}" class="btn btn-outline btn-success" data-content="{{$broadcaster['id']}}"><i class="ti-pencil"></i></a>
                                        @unless($user['type'] !== 'admin')
                                            <a class="btn btn-outline btn-danger delete-broadcaster" data-content="{{$broadcaster['id']}}" data-name="{{$broadcaster['name']}}"><i class="ti-trash"></i></a>
                                        @endunless
                                        <a class="btn btn-outline btn-info listen" data-content="{{$broadcaster['id']}}"><i class="ti-volume"></i></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        @foreach($listening as $broadcaster)
                        <tr data-content="">
                            <td class="text-center">
                                <div class="checkbox-custom">
                                    <input id="product-02" type="checkbox" value="02">
                                    <label for="product-02" class="pl-0">&nbsp;</label>
                                </div>
                            </td>
                            <td class=""><img src="{{asset($broadcaster['img'])}}" width="50" alt="" class="img-thumbnail img-responsive"></td>
                            <td>{{$broadcaster['name']}}</td>
                            <td class="text-center">{{$broadcaster['city']}}, {{$broadcaster['country']}}</td>
                            <td class="text-center">{{$broadcaster['reach']}}</td>
                            <td class="text-center"><span class="label label-outline label-success">listening</span></td>
                            <td class="text-center">
                                <div role="group" aria-label="Basic example" class="btn-group btn-group-sm">
                                    <a href="Reports-broadcaster-Qisimah.html" class="btn btn-outline btn-primary" data-content="{{$broadcaster['id']}}"><i class="ti-eye"></i></a>
                                    <a href="{{route('broadcaster.edit', $broadcaster)}}" class="btn btn-outline btn-success" data-content="{{$broadcaster['id']}}"><i class="ti-pencil"></i></a>
                                    @unless($user['role'] === 'admin')
                                        <a class="btn btn-outline btn-danger delete-broadcaster" data-content="{{$broadcaster['id']}}"><i class="ti-trash"></i></a>
                                    @endunless
                                    <a class="btn btn-outline btn-danger listen" data-content="{{$broadcaster['id']}}" data-user="{{$broadcaster['user_id']}}"><i class="ti-volume"></i></a>
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