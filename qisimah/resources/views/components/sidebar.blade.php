<aside class="main-sidebar">

    <div class="user">
            <div class="col-xs-8 col-md-2" style="font-size: 3em; font-weight: 100; color: white; min-width: 100%; text-shadow: 0 0 20px #48C8FF;" id="timer"></div><br>



        <div id="divProPic" data-percent="65" class="easy-pie-chart">

            <a href="#" onclick="$('#txtProPic').click();">
                <img src="{{($user['img'])? $user['img'] : asset('images/users/avatar.png')}}" alt=""
                     class="media-object img-circle" width="110" height="110" style="margin-left: -10px">

                {{--<img id="imgProPic" src="{{($user['img'])? $user['img'] : asset('images/users/avatar.png')}}"--}}
                     {{--alt="{{ $user['firstname'] }} {{ $user['lastname'] }}" class="avatar img-circle">--}}
                {{--<span class="status bg-success"></span>--}}

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
            <a href="{{url('')}}" class="{{( \Illuminate\Support\Facades\Request::is('/')? "active" : "" )}}"><i class="ti-dashboard"></i>
                <span class="sidebar-title">Dashboard</span>
            </a>
        </li>
        @unless(!in_array($user['type'], ['admin', 'artist', 'record-label']))
            <li class="panel">
                <a href="{{route('albums.index')}}"><i class="ti-folder"></i>
                    <span class="sidebar-title">Albums</span>
                </a>
            </li>
        @endunless
        @unless(!in_array($user['type'], ['admin', 'artist', 'record-label']))
            <li class="panel">
                <a href="{{url('chart')}}"><i class="ti-pulse"></i>
                    <span class="sidebar-title">Charts</span>
                </a>
            </li>
        @endunless
        <li class="panel">
            <a role="button" data-toggle="collapse" data-parent=".navigation" href="#collapse1" aria-expanded="false"
               aria-controls="collapse1" class="bubble {{( ( \Illuminate\Support\Facades\Request::is('file/create/ad') || \Illuminate\Support\Facades\Request::is('file/create/song') ) ? "active" : "collapsed" )}}"><i class="ti-upload"></i><span class="sidebar-title">Upload</span></a>
            <ul id="collapse1" class="list-unstyled {{( ( \Illuminate\Support\Facades\Request::is('file/create/ad') || \Illuminate\Support\Facades\Request::is('file/create/song') ) ? "active" : "collapse" )}}">
                @if($user['type'] === 'admin')
                    <li><a href="{{url('file/create/ad')}}" class="{{( \Illuminate\Support\Facades\Request::is('file/create/ad')? "active" : "" )}}">Upload ad</a></li>
                    <li><a href="{{url('uploads/song')}}" class="{{( \Illuminate\Support\Facades\Request::is
                    ('uploads/song')
                    ? "active" : "" )}}">Upload song</a></li>
                @elseif($user['type'] === 'advertiser')
                    <li><a href="{{url('file/create/ad')}}" class="{{( \Illuminate\Support\Facades\Request::is('file/create/ad')? "active" : "" )}}">Upload ad</a></li>
                @elseif($user['type'] === 'artist' || $user['type'] === 'record-label')
                    <li><a href="{{url('uploads/song')}}" class="class="{{( \Illuminate\Support\Facades\Request::is
                    ('uploads/song')? "active" : "" )}}"">Upload song</a></li>
                @endif
            </ul>
        </li>
        @if($user['type'] === 'admin')
            <li class="panel"><a href="{{url('broadcaster')}}" class="{{( \Illuminate\Support\Facades\Request::is('broadcaster')? "active" : "" )}}"><i class="ti-microphone"></i><span class="sidebar-title">Broadcasters</span></a>
            </li>
        @endif
        <li class="panel"><a href="{{url('file')}}" class="{{( \Illuminate\Support\Facades\Request::is('file')? "active" : "" )}}"><i class="ti-music-alt"></i><span
                        class="sidebar-title">Content</span></a></li>
        @if($user['role'] <> 'uploader')
            <li class="panel">
                <a role="button" data-toggle="collapse" data-parent=".navigation" href="#collapse3"
                                 aria-expanded="false" aria-controls="collapse3" class="{{( ( \Illuminate\Support\Facades\Request::is('play') || \Illuminate\Support\Facades\Request::is('play/broadcaster') || \Illuminate\Support\Facades\Request::is('play/content') )? "active" : "collapsed") }}"><i
                            class="ti-receipt"></i><span class="sidebar-title">Reports</span>
                </a>
                <ul id="collapse3" class="list-unstyled {{( ( \Illuminate\Support\Facades\Request::is('play') || \Illuminate\Support\Facades\Request::is('play/broadcaster') || \Illuminate\Support\Facades\Request::is('report/summary') || \Illuminate\Support\Facades\Request::is('play/content') )? "" : "collapse")}}">
                    <li><a href="{{url('report/summary')}}" class="{{( \Illuminate\Support\Facades\Request::is('report/summary')? "active" : "" )}}">Summary</a></li>
                    <li><a href="{{url('play')}}" class="{{( \Illuminate\Support\Facades\Request::is('play')? "active" : "" )}}">General Reports</a></li>
                    <li><a href="{{url('play/broadcaster')}}" class="{{( \Illuminate\Support\Facades\Request::is('play/broadcaster')? "active" : "" )}}">Broadcaster Reports</a></li>
                    <li><a href="{{url('play/content')}}" class="{{( \Illuminate\Support\Facades\Request::is('play/content')? "active" : "" )}}">Content Reports</a></li>
                </ul>
            </li>
        @endif
        @unless($user['type'] <> 'admin')
            <li class="panel">
                <a role="button" data-toggle="collapse" data-parent=".navigation" href="#admin-menu"
                   aria-expanded="false" aria-controls="collapse3" class="{{( ( \Illuminate\Support\Facades\Request::is('admin/create') || \Illuminate\Support\Facades\Request::is('producer') || \Illuminate\Support\Facades\Request::is('artist') || \Illuminate\Support\Facades\Request::is('genre') )? "active" : "collapsed") }}">
                    <i class="ti-user"></i>
                    <span class="sidebar-title">Admin</span>
                </a>
                <ul id="admin-menu" class="list-unstyled {{( ( \Illuminate\Support\Facades\Request::is('admin/create') || \Illuminate\Support\Facades\Request::is('producer') || \Illuminate\Support\Facades\Request::is('artist') || \Illuminate\Support\Facades\Request::is('genre') )? "active" : "collapse") }}">
                    @if($user['role'] === 'master')
                        <li><a href="{{route('admin.create')}}" class="{{( \Illuminate\Support\Facades\Request::is('admin/create') )? "active" : ""}}">Users</a></li>
                    @endif
                    <li><a href="{{ route('labels.index') }}" class="{{( \Illuminate\Support\Facades\Request::is
                    ('labels') )? "active" :
                    ""}}">Labels</a></li>
                    <li><a href="{{url('artist')}}" class="{{( \Illuminate\Support\Facades\Request::is('artist') )? "active" : ""}}">Artists</a></li>
                    <li><a href="{{url('genre')}}" class="{{( \Illuminate\Support\Facades\Request::is('genre') )? "active" : ""}}">Genres</a></li>
                    <li><a href="{{route('producer.index')}}" class="{{( \Illuminate\Support\Facades\Request::is('producer') )? "active" : ""}}">Producers</a></li>
                </ul>
            </li>
        @endunless
        <li class="panel">
            <a href="{{url('logout')}}" class=""><i class="ti-power"></i>
                <span class="sidebar-title">Logout</span>
            </a>
        </li>

    </ul>

</aside>