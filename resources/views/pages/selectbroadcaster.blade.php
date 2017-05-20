@extends('layouts.master')
@section('title')
    Select Broadcasters
@endsection
@section('content')
    <div class="page-content container-fluid">
        <div class="row">
            <div class="col-xs-12 col-md-8 col-md-offset-2">
                <div class="widget row p-20">
                    <div class="widget-body form-group">
                        <select class="form-control col-lg-6" id="searchable-ms" multiple="multiple">
                            <option value="Y FM">Y FM</option>
                            <option value="CSS">Peace FM</option>
                            <option value="Javascript">Live FM</option>
                            <option value="PHP">Joy FM</option>
                            <option value="ASP.NET">Adom FM</option>
                            <option value="Visual Basic">Metro FM</option>
                            <option value="Java">Luv FM</option>
                            <option value="Python">Happy FM</option>
                            <option value="Less">Star FM</option>
                            <option value="Stylus">Radio Gold</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="text-right">
                            <button type="submit" class="mt-15 btn btn-primary"><i class="ti-plus mr-5"></i>Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection