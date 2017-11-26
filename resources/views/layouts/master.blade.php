{{--Page Head--}}
@include('components.head')
{{--/Page Head--}}
{{--Header--}}
@include('components.header')
{{--/Header--}}
<div class="main-container">
    {{--Sidebar--}}
    @include('components.sidebar')
    {{--/Sidebar--}}
    <div class="page-container">
        {{--Page Title--}}
        <div class="page-header container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="mt-0 mb-5">
                        @yield('title')
                    </h4>
                </div>
            </div>
        </div>
        {{--/Page Title--}}
        {{--Dynamic--}}
        @yield('content')
        {{--/Dynamic--}}
        @include('components.footer')
    </div>
    @include('components.right')
</div>
@include('components.scripts')
