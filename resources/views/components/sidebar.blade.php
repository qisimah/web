<aside class="main-sidebar">
    <div class="user">
        <div id="esp-user-profile" data-percent="65" style="height: 130px; width: 130px; line-height: 100px; padding: 15px;" class="easy-pie-chart">
            <img src="{{asset('images/users/Kofi-Kinaata-1.jpg')}}" alt="" class="avatar img-circle"><span class="status bg-success"></span></div>
        <h4 class="fs-16 text-white mt-15 mb-5 fw-300">{{$user['firstname']}} {{$user['lastname']}}</h4>
        <p class="mb-0 text-muted">{{$user['type']}}</p>
    </div>
    <ul class="list-unstyled navigation mb-0">
        <li class="sidebar-category">Main</li>
        <li class="panel">
            <a href="{{url('/')}}"><i class="ti-dashboard"></i>
                <span class="sidebar-title">Dashboard</span>
            </a>
        </li>
        <li class="panel">
            <a role="button" data-toggle="collapse" data-parent=".navigation" href="#collapse1" aria-expanded="false" aria-controls="collapse1" class="bubble collapsed"><i class="ti-upload"></i><span class="sidebar-title">Upload</span></a>
            <ul id="collapse1" class="list-unstyled collapse">
                <li><a href="/file/create">Upload Content</a></li>
                <li><a href="/files/create">Upload Album</a></li>
            </ul>
        </li>
        <li class="panel"><a href="{{url('/broadcaster')}}"><i class="ti-microphone"></i><span class="sidebar-title">Broadcasters</span></a></li>
        <li class="panel"><a href="/file"><i class="ti-music-alt"></i><span class="sidebar-title">Content</span></a></li>
        <li class="panel"><a role="button" data-toggle="collapse" data-parent=".navigation" href="#collapse3" aria-expanded="false" aria-controls="collapse3" class="active collapsed"><i class="ti-receipt"></i><span class="sidebar-title">Reports</span></a>
            <ul id="collapse3" class="list-unstyled collapse">
                <li><a href="/play">General Reports</a></li>
                <li><a href="/play/broadcaster">Broadcaster Reports</a></li>
                <li><a href="/play/content" class="active">Content Reports</a></li>
            </ul>
        </li>
        @unless($user['type'] !== 'admin')
        <li class="panel">
            <a role="button" data-toggle="collapse" data-parent=".navigation" href="#admin-menu" aria-expanded="false" aria-controls="collapse3" class="collapsed">
                <i class="ti-receipt"></i>
                <span class="sidebar-title">Admin</span>
            </a>
            <ul id="admin-menu" class="list-unstyled collapse">
                <li><a href="{{route('admin.create')}}">Users</a></li>
                <li><a href="{{route('artist.index')}}">Artists</a></li>
                <li><a href="report-content-Qisim.html" class="active">Content Reports</a></li>
            </ul>
        </li>
        @endunless
    </ul>
</aside>