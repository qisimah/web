@extends('layouts.master')
@section('title')
    My Library
@endsection
@section('content')
    <div class="page-content container-fluid">
        <div class="widget">
            <div class="widget-heading">
                <h3 class="widget-title">
                    <a href="/file/create" class="btn btn-outline btn-primary">
                        <i class="ti-plus mr-5"></i>
                        Add New Content
                    </a>
                </h3>
            </div>
            <div class="widget-body">

                <table id="product-list" style="width: 100%" class="table table-hover dt-responsive nowrap">
                    <thead>
                    <tr>
                        <th class="text-center">
                            <div class="checkbox-custom">
                                <input id="checkAll" type="checkbox" value="option1">
                                <label for="checkAll" class="pl-0">&nbsp;</label>
                            </div>
                        </th>
                        <th class="text-center">Image</th>
                        <th class="text-center">Title</th>
                        <th class="text-center">Artist</th>
                        <th class="text-center">Top Broadcaster</th>
                        <th class="text-center">Total Plays</th>
                        <th class="text-center">Date Uploaded</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @unless($files)
                    <tr>
                        <td class="text-center" colspan="9">
                            <a href="/file/create" class="btn btn-outline btn-info">Let's upload your first audio</a>
                        </td>

                    </tr>
                    @endunless
                    @foreach($files as $file)
                    <tr>
                        <td class="text-center">
                            <div class="checkbox-custom">
                                <input id="product-02" type="checkbox" value="02">
                                <label for="product-02" class="pl-0">&nbsp</label>
                            </div>
                        </td>
                        <td class=""><img src="{{$file['img']}}" width="50" alt="" class="img-thumbnail img-responsive"></td>
                        <td>{{$file['title']}}</td>
                        <td class="text-right">
                            @if(isset($file['artists']))
                                @foreach($file['artists'] as $artist)
                                    {{$artist->nick_name}}<br>
                                @endforeach
                            @endif
                        </td>
                        <td class="text-right">Live FM</td>
                        <td class="text-right">200</td>
                        <td class="text-right">{{Carbon\Carbon::parse($file['created_at'])->diffForHumans()}}</td>
                        <?php
                        if($file['indexed'] === 0){
                        	$class = 'label-danger';
                            $status = 'Pending';
                        } elseif ($file['indexed'] === 2){
                        	$class = 'label-warning';
                        	$status = 'Indexing';
                        } else {
                        	$class = 'label-success';
						    $status = 'Ready';
                        }
                        ?>
                        <td class="text-center"><span class="label label-outline {{$class}}">{{$status}}</span></td>
                        <td class="text-center">
                            <div role="group" aria-label="Basic example" class="btn-group btn-group-sm">
                                <a type="button" class="btn btn-outline btn-primary" href="Reports-content-Qisimah.html"><i class="ti-eye"></i></a>
                                <a href="{{url('/file/'.$file['id'].'/edit')}}" type="button" class="btn btn-outline btn-success"><i class="ti-pencil"></i></a>
                                <a href="{{url('/file/'.$file['id'])}}" data-record-id="{{$file['id']}}" type="button" class="btn btn-outline btn-danger delete-record"><i class="ti-trash"></i></a>
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