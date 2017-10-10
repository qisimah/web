<aside class="main-sidebar">
    <div class="user">
        <div id="divProPic" data-percent="65" style="height: 130px; width: 130px; line-height: 100px; padding: 15px;" class="easy-pie-chart">
            <a href="#" onclick="$('#txtProPic').click();">
                <img id="imgProPic" src="{{($user['img'])? $user['img'] : asset('images/users/avatar.png')}}" alt="" class="avatar img-circle">
                <span class="status bg-success"></span>
            </a>
        </div>
        <h4 class="fs-16 text-white mt-15 mb-5 fw-300">{{$user['firstname']}} {{$user['lastname']}}</h4>
        <p class="mb-0 text-muted">{{$user['type']}}</p>
            <form action="">
                <input type="file" id="txtProPic" data-user="{{$user['id']}}" style="visibility: hidden">
            </form>
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
                @if($user['type'] === 'admin')
                <li><a href="/file/create/ad">Upload ad</a></li>
                <li><a href="/file/create/song">Upload song</a></li>
                @elseif($user['type'] === 'advertiser')
                <li><a href="/file/create/ad">Upload ad</a></li>
                @elseif($user['type'] === 'artist' || $user['type'] === 'record-label')
                <li><a href="/file/create/song">Upload song</a></li>
                @endif
            </ul>
        </li>
        @if(\Illuminate\Support\Facades\Auth::user()->type === 'admin')
        <li class="panel"><a href="{{url('/broadcaster')}}"><i class="ti-microphone"></i><span class="sidebar-title">Broadcasters</span></a></li>
        @endif
        <li class="panel"><a href="/file"><i class="ti-music-alt"></i><span class="sidebar-title">Content</span></a></li>
        @if($user['role'] !== 'uploader')
        <li class="panel"><a role="button" data-toggle="collapse" data-parent=".navigation" href="#collapse3" aria-expanded="false" aria-controls="collapse3" class="collapsed"><i class="ti-receipt"></i><span class="sidebar-title">Reports</span></a>
            <ul id="collapse3" class="list-unstyled collapse">
                <li><a href="/play">General Reports</a></li>
                <li><a href="/play/broadcaster">Broadcaster Reports</a></li>
                <li><a href="/play/content" class="active">Content Reports</a></li>
            </ul>
        </li>
        @endif
        @unless($user['type'] !== 'admin')
        <li class="panel">
            <a role="button" data-toggle="collapse" data-parent=".navigation" href="#admin-menu" aria-expanded="false" aria-controls="collapse3" class="collapsed">
                <i class="ti-receipt"></i>
                <span class="sidebar-title">Admin</span>
            </a>
            <ul id="admin-menu" class="list-unstyled collapse">
                @if($user['role'] === 'master')
                <li><a href="{{route('admin.create')}}">Users</a></li>
                @endif
                <li><a href="{{url('/artist')}}">Artists</a></li>
                <li><a href="/genre" class="active">Genres</a></li>
                <li><a href="{{route('producer.index')}}" class="active">Producers</a></li>
            </ul>
        </li>
        @endunless
    </ul>
</aside>