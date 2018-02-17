@extends('layouts.master')
@section('title')
genres
@endsection
@section('content')
    <div class="page-content container-fluid">
        <div class="row">
            <div class="col-xs-12 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1">
                <div class="widget">
                    <div class="widget-heading">
                        <h3 class="widget-title">add new genre</h3>
                    </div>
                    <div class="widget-body">
                        <form class="" method="post" action="/genre/create">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-xs-12 col-md-6 col-lg-6">
                                    <div class="form-group has-feedback">
                                        <input type="text" id="genre-name" class="form-control isValid" name="name" placeholder="name of genre required" required>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-6 col-lg-6">
                                    <button class="btn btn-primary btn-outline btn-block">
                                        save genre
                                    </button>
                                </div>
                            </div>
                        </form>
                        <hr>
                        <table style="width: 100%" class="table table-responsive table-striped datatables table-hover dt-responsive nowrap">
                            <thead>
                            <tr>
                                <th class="text-center">
                                    <div class="checkbox-custom">
                                        <input id="checkAll" type="checkbox" value="option1">
                                        <label for="checkAll" class="pl-0">&nbsp;</label>
                                    </div>
                                </th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Songs</th>
                                <th class="text-center">Creator</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($genres as $genre)
                                <tr>
                                    <td>

                                    </td>
                                    <td class="genre-name text-center">
                                        {{$genre->name}}
                                    </td>
                                    <td>

                                    </td>
                                    <td>

                                    </td>
                                    <td class="text-center">
                                        <div role="group" aria-label="Basic example" class="btn-group btn-group-sm col-xs-12">
                                            <a class="btn btn-outline btn-success edit-genre col-xs-6" data-content="{{$genre->id}}"><i class="ti-pencil"></i></a>
                                            <a class="btn btn-outline btn-danger delete-genre col-xs-6" data-content="{{$genre->id}}" data-name="{{$genre->name}}"><i class="ti-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection