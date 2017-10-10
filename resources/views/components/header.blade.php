{{--Header Start--}}
<header>
    {{--<div class="search-bar closed">--}}
        {{--<form>--}}
            {{--<div class="input-group input-group-lg">--}}
                {{--<input type="text" placeholder="Search for..." class="form-control">--}}
                {{--<span class="input-group-btn">--}}
                    {{--<button type="button" class="btn btn-default search-bar-toggle">--}}
                        {{--<i class="ti-close"></i>--}}
                    {{--</button>--}}
                {{--</span>--}}
            {{--</div>--}}
        {{--</form>--}}
    {{--</div>--}}
    <a href="/" class="brand pull-left">
        <img src="{{asset('images/logo/logo-light.png')}}" alt="" width="100" class="logo">
        <img src="{{asset('images/logo/logo-sm-light.png')}}" alt="" width="28" class="logo-sm">
    </a>
    <a href="javascript:;" role="button" class="hamburger-menu pull-left">
        <span></span>
    </a>
    <form class="mt-15 mb-15 pull-left hidden-xs">
        <div class="form-group has-feedback mb-0">
            {{--<input type="text" aria-describedby="inputSearchFor" placeholder="Search for..." style="width: 200px" class="form-control rounded">--}}
            {{--<span aria-hidden="true" class="ti-search form-control-feedback"></span>--}}
            {{--<span id="inputSearchFor" class="sr-only">(default)</span>--}}
        </div>
    </form>
    <ul class="notification-bar list-inline pull-right">
        <li class="visible-xs">
            <a href="javascript:;" role="button" class="header-icon search-bar-toggle">
                <i class="ti-search"></i>
            </a>
        </li>
        {{--<li class="dropdown">--}}
            {{--<a id="dropdownMenu1" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle bubble header-icon">--}}
                {{--<i class="ti-world"></i>--}}
                {{--<span class="badge bg-danger">6</span>--}}
            {{--</a>--}}
            {{--<div aria-labelledby="dropdownMenu1" class="dropdown-menu dropdown-menu-right dm-medium fs-12 animated fadeInDown">--}}
                {{--<h5 class="dropdown-header">You have 6 notifications</h5>--}}
                {{--<ul data-mcs-theme="minimal-dark" class="media-list mCustomScrollbar">--}}
                    {{--<li class="media">--}}
                        {{--<a href="javascript:;">--}}
                            {{--<div class="media-left avatar">--}}
                                {{--<img src="{{asset('images/logo/logo-sm-light.png')}}" alt="" class="media-object img-circle">--}}
                                {{--<span class="status bg-warning"></span>--}}
                            {{--</div>--}}
                            {{--<div class="media-body">--}}
                                {{--<h6 class="media-heading">William Carlson</h6>--}}
                                {{--<p class="text-muted mb-0">Commented on your post</p>--}}
                            {{--</div>--}}
                            {{--<div class="media-right text-nowrap">--}}
                                {{--<time datetime="2015-12-10T20:27:48+07:00" class="fs-11">5 mins</time>--}}
                            {{--</div>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li class="media">--}}
                        {{--<a href="javascript:;">--}}
                            {{--<div class="media-left avatar">--}}
                                {{--<img src="{{asset('images/logo/logo-sm-light.png')}}" alt="" class="media-object img-circle">--}}
                                {{--<span class="status bg-danger"></span>--}}
                            {{--</div>--}}
                            {{--<div class="media-body">--}}
                                {{--<h6 class="media-heading">Barbara Ortega</h6>--}}
                                {{--<p class="text-muted mb-0">Sent you a new email</p>--}}
                            {{--</div>--}}
                            {{--<div class="media-right text-nowrap">--}}
                                {{--<time datetime="2015-12-10T20:42:40+07:00" class="fs-11">8 mins</time>--}}
                            {{--</div>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li class="media">--}}
                        {{--<a href="javascript:;">--}}
                            {{--<div class="media-left avatar">--}}
                                {{--<img src="{{asset('images/logo/logo-sm-light.png')}}" alt="" class="media-object img-circle">--}}
                                {{--<span class="status bg-success"></span>--}}
                            {{--</div>--}}
                            {{--<div class="media-body">--}}
                                {{--<h6 class="media-heading">Mark Barnett</h6>--}}
                                {{--<p class="text-muted mb-0">Sent you a new message</p>--}}
                            {{--</div>--}}
                            {{--<div class="media-right text-nowrap">--}}
                                {{--<time datetime="2015-12-10T20:50:48+07:00" class="fs-11">9 mins</time>--}}
                            {{--</div>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li class="media">--}}
                        {{--<a href="javascript:;">--}}
                            {{--<div class="media-left avatar">--}}
                                {{--<img src="{{asset('images/logo/logo-sm-light.png')}}" alt="" class="media-object img-circle">--}}
                                {{--<span class="status bg-danger"></span>--}}
                            {{--</div>--}}
                            {{--<div class="media-body">--}}
                                {{--<h6 class="media-heading">Alexander Gilbert</h6>--}}
                                {{--<p class="text-muted mb-0">Sent you a new email</p>--}}
                            {{--</div>--}}
                            {{--<div class="media-right text-nowrap">--}}
                                {{--<time datetime="2015-12-10T20:42:40+07:00" class="fs-11">15 mins</time>--}}
                            {{--</div>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li class="media">--}}
                        {{--<a href="javascript:;">--}}
                            {{--<div class="media-left avatar">--}}
                                {{--<img src="{{asset('images/logo/logo-sm-light.png')}}" alt="" class="media-object img-circle">--}}
                                {{--<span class="status bg-success"></span>--}}
                            {{--</div>--}}
                            {{--<div class="media-body">--}}
                                {{--<h6 class="media-heading">Amanda Collins</h6>--}}
                                {{--<p class="text-muted mb-0">You have 8 unread messages</p>--}}
                            {{--</div>--}}
                            {{--<div class="media-right text-nowrap">--}}
                                {{--<time datetime="2015-12-10T20:35:35+07:00" class="fs-11">22 mins</time>--}}
                            {{--</div>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li class="media">--}}
                        {{--<a href="javascript:;">--}}
                            {{--<div class="media-left avatar">--}}
                                {{--<img src="{{asset('images/logo/logo-sm-light.png')}}" alt="" class="media-object img-circle">--}}
                                {{--<span class="status bg-warning"></span>--}}
                            {{--</div>--}}
                            {{--<div class="media-body">--}}
                                {{--<h6 class="media-heading">Christian Lane</h6>--}}
                                {{--<p class="text-muted mb-0">Commented on your post</p>--}}
                            {{--</div>--}}
                            {{--<div class="media-right text-nowrap">--}}
                                {{--<time datetime="2015-12-10T20:27:48+07:00" class="fs-11">30 mins</time>--}}
                            {{--</div>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                {{--</ul>--}}
                {{--<div class="dropdown-footer text-center p-10">--}}
                    {{--<a href="javascript:;" class="fw-500 text-muted">See all notifications</a>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</li>--}}
        <li class="dropdown hidden-xs">
            <a id="dropdownMenu2" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle header-icon lh-1 pt-15 pb-15">
                <div class="media mt-0">
                    <div class="media-left avatar">
                        <img src="{{($user['img'])? $user['img'] : asset('images/users/avatar.png')}}" alt="" class="media-object img-circle"><span class="status bg-success"></span></div>
                    <div class="media-right media-middle pl-0">
                        <p class="fs-12 text-base mb-0">Hi, {{$user['firstname']}}</p>
                    </div>
                </div>
            </a>
            <ul aria-labelledby="dropdownMenu2" class="dropdown-menu fs-12 animated fadeInDown">
                {{--<li><a href="profile.html"><i class="ti-user mr-5"></i> My Profile</a></li>--}}
                {{--<li><a href="profile.html"><i class="ti-settings mr-5"></i> Account Settings</a></li>--}}
                <li><a href="" onclick="
                event.preventDefault();
document.getElementById('logout-form').submit();"><i class="ti-power-off mr-5"></i> Logout</a></li>
            </ul>
        </li>
        {{--Notification--}}
        {{--<li>--}}
            {{--<a href="javascript:;" role="button" class="right-sidebar-toggle bubble header-icon">--}}
                {{--<i class="ti-layout-sidebar-right"></i>--}}
                {{--<span class="dot bg-danger"></span>--}}
            {{--</a>--}}
        {{--</li>--}}
    </ul>
    <form action="{{route('logout')}}" method="post" id="logout-form">
        {{csrf_field()}}
    </form>
</header>
{{--Header End--}}