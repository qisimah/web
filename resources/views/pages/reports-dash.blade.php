@extends('layouts.master')
@section('title')
    Reports Dashboard
@endsection
@section('content')
    <div class="page-content container-fluid">

        <div class="row">
            <h3 class="widget-title">Monthly Plays</h3>
            <div class="col-lg-8" id="linechart" style="height: 494px">
                {{--<div style="display: flex; justify-content: center">--}}
                {{--<i class="fa fa-spinner"></i> generating graph, please relax!--}}
                {{--</div>--}}
            </div>

            <div class="col-lg-4">
                <h3 class="widget-title text-center">Regional plays</h3>
                <div id="region-share" style="height: 224px"></div>
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                        <tr>
                            <th style="width:10%">#</th>
                            <th style="width:40%">Region</th>
                            <th style="width:25%">Total plays</th>
                            <!-- <th style="width:25%">Up/Down</th> -->
                        </tr>
                        </thead>
                        <tbody id="top-5-broadcaster">
                        <tr>
                            <td colspan="3" class="text-center">Fetching data, please wait</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

                <div class="row">

            <div class="col-lg-12">
                <h3 class="widget-title text-center">Country Detections</h3>
                <div id="regions_div" style="height: 495px;"></div>
            </div>


        </div>

        <div class="row">
            <br>
            <br>
            <div class="col-lg-6">
                <h3 class="widget-title text-center">Top 5 most played / Quarter</h3>
                <div id="columnchart_material" style="height: 295px;" class="mb-30"></div>
            </div>

            <div class="col-lg-6">
                <h3 class="widget-title text-center">Top 5 Radio Stations</h3>
                <div id="chart_div" style="height: 295px;" class="mb-30"></div>
            </div>
        </div>

        {{--<div class="row">--}}
            {{--<div class="col-lg-12">--}}
                {{--<div class="widget clear">--}}
                    {{--<div class="widget-heading clearfix">--}}
                        {{--<h3 class="widget-title text-center">Live Detections</h3>--}}
                        {{--<ul class="widget-tools pull-right list-inline">--}}
                            {{--<li>--}}
                                {{--<a href="javascript:;" class="widget-collapse">--}}
                                    {{--<i class="ti-angle-up"></i>--}}
                                {{--</a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<a href="javascript:;" class="widget-reload">--}}
                                    {{--<i class="ti-reload"></i>--}}
                                {{--</a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<a href="javascript:;" class="widget-remove">--}}
                                    {{--<i class="ti-close"></i>--}}
                                {{--</a>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                    {{--<div class="widget-body">--}}
                        {{--<div class="row">--}}
                            {{--<div class="col-md-12">--}}
                                {{--<div class="widget no-border">--}}
                                    {{--<table id="order-table" style="width: 100%"--}}
                                           {{--class="table table-hover dt-responsive nowrap">--}}
                                        {{--<thead>--}}
                                        {{--<tr>--}}
                                            {{--<th style="width:16%">Order ID</th>--}}
                                            {{--<th style="width:37%">Customer</th>--}}
                                            {{--<th style="width:20%">Date Added</th>--}}
                                            {{--<th style="width:12%">Total</th>--}}
                                            {{--<th style="width:15%">Completed</th>--}}
                                        {{--</tr>--}}
                                        {{--</thead>--}}
                                        {{--<tbody>--}}
                                        {{--<tr>--}}
                                            {{--<td>#6546</td>--}}
                                            {{--<td>--}}
                                                {{--<div class="media">--}}
                                                    {{--<div class="media-left avatar">--}}
                                                        {{--<img src="{{asset('images/users/10.jpg')}}" alt=""--}}
                                                             {{--class="media-object img-circle">--}}
                                                        {{--<span class="status bg-success"></span>--}}
                                                    {{--</div>--}}
                                                    {{--<div class="media-body">--}}
                                                        {{--<h5 class="media-heading">Philip Fernandez</h5>--}}
                                                        {{--<p class="text-muted mb-0">489 Rhapsody Street</p>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            {{--</td>--}}
                                            {{--<td>20 Feb 2016</td>--}}
                                            {{--<td>$140.00</td>--}}
                                            {{--<td class="text-center text-success">--}}
                                                {{--<i class="ti-check"></i>--}}
                                            {{--</td>--}}
                                        {{--</tr>--}}
                                        {{--<tr>--}}
                                            {{--<td>#6941</td>--}}
                                            {{--<td>--}}
                                                {{--<div class="media">--}}
                                                    {{--<div class="media-left avatar">--}}
                                                        {{--<img src="{{asset('images/users/20.jpg')}}" alt=""--}}
                                                             {{--class="media-object img-circle">--}}
                                                        {{--<span class="status bg-success"></span>--}}
                                                    {{--</div>--}}
                                                    {{--<div class="media-body">--}}
                                                        {{--<h5 class="media-heading">Mary Carr</h5>--}}
                                                        {{--<p class="text-muted mb-0">3611 West Fork Drive</p>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            {{--</td>--}}
                                            {{--<td>20 Feb 2016</td>--}}
                                            {{--<td>$120.00</td>--}}
                                            {{--<td class="text-center text-danger">--}}
                                                {{--<i class="ti-close"></i>--}}
                                            {{--</td>--}}
                                        {{--</tr>--}}
                                        {{--<tr>--}}
                                            {{--<td>#3202</td>--}}
                                            {{--<td>--}}
                                                {{--<div class="media">--}}
                                                    {{--<div class="media-left avatar">--}}
                                                        {{--<img src="{{asset('images/users/11.jpg')}}" alt=""--}}
                                                             {{--class="media-object img-circle">--}}
                                                        {{--<span class="status bg-danger"></span>--}}
                                                    {{--</div>--}}
                                                    {{--<div class="media-body">--}}
                                                        {{--<h5 class="media-heading">Joseph Salazar</h5>--}}
                                                        {{--<p class="text-muted mb-0">4489 Hart Ridge Road</p>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            {{--</td>--}}
                                            {{--<td>20 Feb 2016</td>--}}
                                            {{--<td>$590.00</td>--}}
                                            {{--<td class="text-center text-success">--}}
                                                {{--<i class="ti-check"></i>--}}
                                            {{--</td>--}}
                                        {{--</tr>--}}
                                        {{--<tr>--}}
                                            {{--<td>#8302</td>--}}
                                            {{--<td>--}}
                                                {{--<div class="media">--}}
                                                    {{--<div class="media-left avatar">--}}
                                                        {{--<img src="{{asset('images/users/06.jpg')}}" alt=""--}}
                                                             {{--class="media-object img-circle">--}}
                                                        {{--<span class="status bg-warning"></span>--}}
                                                    {{--</div>--}}
                                                    {{--<div class="media-body">--}}
                                                        {{--<h5 class="media-heading">John Cruz</h5>--}}
                                                        {{--<p class="text-muted mb-0">3274 Lyndon Street</p>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            {{--</td>--}}
                                            {{--<td>20 Feb 2016</td>--}}
                                            {{--<td>$940.00</td>--}}
                                            {{--<td class="text-center text-danger">--}}
                                                {{--<i class="ti-close"></i>--}}
                                            {{--</td>--}}
                                        {{--</tr>--}}
                                        {{--<tr>--}}
                                            {{--<td>#8943</td>--}}
                                            {{--<td>--}}
                                                {{--<div class="media">--}}
                                                    {{--<div class="media-left avatar">--}}
                                                        {{--<img src="{{asset('images/users/19.jpg')}}" alt=""--}}
                                                             {{--class="media-object img-circle">--}}
                                                        {{--<span class="status bg-success"></span>--}}
                                                    {{--</div>--}}
                                                    {{--<div class="media-body">--}}
                                                        {{--<h5 class="media-heading">Jacqueline Rios</h5>--}}
                                                        {{--<p class="text-muted mb-0">559 Holly Street</p>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            {{--</td>--}}
                                            {{--<td>20 Feb 2016</td>--}}
                                            {{--<td>$490.00</td>--}}
                                            {{--<td class="text-center text-success">--}}
                                                {{--<i class="ti-check"></i>--}}
                                            {{--</td>--}}
                                        {{--</tr>--}}
                                        {{--<tr>--}}
                                            {{--<td>#8943</td>--}}
                                            {{--<td>--}}
                                                {{--<div class="media">--}}
                                                    {{--<div class="media-left avatar">--}}
                                                        {{--<img src="{{asset('images/users/01.jpg')}}" alt=""--}}
                                                             {{--class="media-object img-circle">--}}
                                                        {{--<span class="status bg-success"></span>--}}
                                                    {{--</div>--}}
                                                    {{--<div class="media-body">--}}
                                                        {{--<h5 class="media-heading">Samuel Hayes</h5>--}}
                                                        {{--<p class="text-muted mb-0">716 Riverwood Drive</p>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            {{--</td>--}}
                                            {{--<td>20 Feb 2016</td>--}}
                                            {{--<td>$230.00</td>--}}
                                            {{--<td class="text-center text-success">--}}
                                                {{--<i class="ti-check"></i>--}}
                                            {{--</td>--}}
                                        {{--</tr>--}}
                                        {{--<tr>--}}
                                            {{--<td>#2357</td>--}}
                                            {{--<td>--}}
                                                {{--<div class="media">--}}
                                                    {{--<div class="media-left avatar">--}}
                                                        {{--<img src="{{asset('images/users/15.jpg')}}" alt=""--}}
                                                             {{--class="media-object img-circle">--}}
                                                        {{--<span class="status bg-success"></span>--}}
                                                    {{--</div>--}}
                                                    {{--<div class="media-body">--}}
                                                        {{--<h5 class="media-heading">Tyler Hamilton</h5>--}}
                                                        {{--<p class="text-muted mb-0">1979 Monroe Street</p>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            {{--</td>--}}
                                            {{--<td>20 Feb 2016</td>--}}
                                            {{--<td>$319.00</td>--}}
                                            {{--<td class="text-center text-success">--}}
                                                {{--<i class="ti-check"></i>--}}
                                            {{--</td>--}}
                                        {{--</tr>--}}
                                        {{--<tr>--}}
                                            {{--<td>#5784</td>--}}
                                            {{--<td>--}}
                                                {{--<div class="media">--}}
                                                    {{--<div class="media-left avatar">--}}
                                                        {{--<img src="{{asset('images/users/16.jpg')}}" alt=""--}}
                                                             {{--class="media-object img-circle">--}}
                                                        {{--<span class="status bg-success"></span>--}}
                                                    {{--</div>--}}
                                                    {{--<div class="media-body">--}}
                                                        {{--<h5 class="media-heading">Lawrence Castillo</h5>--}}
                                                        {{--<p class="text-muted mb-0">1704 Saints Alley</p>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            {{--</td>--}}
                                            {{--<td>20 Feb 2016</td>--}}
                                            {{--<td>$860.00</td>--}}
                                            {{--<td class="text-center text-success">--}}
                                                {{--<i class="ti-check"></i>--}}
                                            {{--</td>--}}
                                        {{--</tr>--}}
                                        {{--</tbody>--}}
                                    {{--</table>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    </div>
@endsection