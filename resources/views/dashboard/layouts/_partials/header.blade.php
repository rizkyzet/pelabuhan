<header class="c-header c-header-light c-header-fixed c-header-with-subheader">
    <button class="c-header-toggler c-class-toggler d-lg-none mfe-auto" type="button" data-target="#sidebar"
        data-class="c-sidebar-show">
        <svg class="c-icon c-icon-lg">
            <use xlink:href="/coreui/vendors/@coreui/icons/svg/free.svg#cil-menu"></use>
        </svg>
    </button><a class="c-header-brand d-lg-none" href="#">
        <svg width="118" height="46" alt="CoreUI Logo">
            <use xlink:href="/assets/brand/coreui.svg#full"></use>
        </svg></a>
    <button class="c-header-toggler c-class-toggler mfs-3 d-md-down-none" type="button" data-target="#sidebar"
        data-class="c-sidebar-lg-show" responsive="true">
        <svg class="c-icon c-icon-lg">
            <use xlink:href="{{asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-menu')}}"></use>
        </svg>
    </button>
    {{-- <ul class="c-header-nav d-md-down-none">
        <li class="c-header-nav-item px-3"><a class="c-header-nav-link" href="#">Dashboard</a></li>
        <li class="c-header-nav-item px-3"><a class="c-header-nav-link" href="#">Users</a></li>
        <li class="c-header-nav-item px-3"><a class="c-header-nav-link" href="#">Settings</a></li>
    </ul> --}}
    <ul class="c-header-nav ml-auto mr-4">
        {{-- <li class="c-header-nav-item d-md-down-none mx-2"><a class="c-header-nav-link" href="#">
                <svg class="c-icon">
                    <use xlink:href="coreui/vendors/@coreui/icons/svg/free.svg#cil-bell"></use>
                </svg></a></li>
        <li class="c-header-nav-item d-md-down-none mx-2"><a class="c-header-nav-link" href="#">
                <svg class="c-icon">
                    <use xlink:href="coreui/vendors/@coreui/icons/svg/free.svg#cil-list-rich"></use>
                </svg></a></li>
        <li class="c-header-nav-item d-md-down-none mx-2"><a class="c-header-nav-link" href="#">
                <svg class="c-icon">
                    <use xlink:href="coreui/vendors/@coreui/icons/svg/free.svg#cil-envelope-open"></use>
                </svg></a></li> --}}
        <li class="c-header-nav-item dropdown"><a class="c-header-nav-link" data-toggle="dropdown" href="#"
                role="button" aria-haspopup="true" aria-expanded="false">
                <div class="c-avatar"><img class="c-avatar-img" src="{{asset('storage/'.Auth::user()->foto)}}"
                        alt="user@email.com"></div>
            </a>
            <div class="dropdown-menu dropdown-menu-right pt-0">
                <div class="dropdown-header bg-light py-2"><strong>Account</strong></div>

                @if(Auth::user()->role->name=='admin')
                <a class="dropdown-item" href="{{route('admin')}}">
                    <svg class="c-icon mr-2">
                        <use xlink:href="/coreui/vendors/@coreui/icons/svg/free.svg#cil-user"></use>
                    </svg> My Profile</a>
                </a>
                @elseif(Auth::user()->role->name=='agen')
                <a class="dropdown-item" href="{{route('agen')}}">
                    <svg class="c-icon mr-2">
                        <use xlink:href="/coreui/vendors/@coreui/icons/svg/free.svg#cil-user"></use>
                    </svg> My Profile</a><a class="dropdown-item" href="{{route('agen')}}">
                </a>
                @elseif(Auth::user()->role->name=='pimpinan')
                <a class="dropdown-item" href="{{route('pimpinan')}}">
                    <svg class="c-icon mr-2">
                        <use xlink:href="/coreui/vendors/@coreui/icons/svg/free.svg#cil-user"></use>
                    </svg> My Profile</a><a class="dropdown-item" href="{{route('pimpinan')}}">
                </a>
                @endif

                <a class="dropdown-item" href="{{route(Auth::user()->role->name.'.password')}}">
                    <svg class="c-icon mr-2">
                        <use xlink:href="{{asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-lock-locked')}}">
                        </use>
                    </svg> Ubah Password</a>
                </a>
                <div class="dropdown-header bg-light py-2"><strong>{{ucwords(Auth::user()->role->name)}}</strong>
                </div>

                @canany(['admin','pimpinan'])
                <a class="dropdown-item" href="{{route(Auth::user()->role->name.'.user.index')}}">
                    <svg class="c-icon mr-2">
                        <use xlink:href="{{asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-people')}}"></use>
                    </svg> Users</a>
                </a>
                @endcanany

                @canany(['admin','pimpinan'])
                <a class="dropdown-item" href="{{route(Auth::user()->role->name.'.kapal.index')}}">
                    <svg class="c-icon mr-2">
                        <use xlink:href="{{asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-boat-alt')}}"></use>
                    </svg> Kapal</a>
                </a>
                @endcanany

                @canany(['admin','pimpinan'])
                <a class="dropdown-item" href="{{route(Auth::user()->role->name.'.dermaga.index')}}">
                    <svg class="c-icon mr-2">
                        <use xlink:href="{{asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-industry')}}">
                        </use>
                    </svg> Dermaga</a>
                </a>
                @endcanany

                @canany(['admin','pimpinan','agen'])
                <a class="dropdown-item" href="{{route(Auth::user()->role->name.'.jadwal.index')}}">
                    <svg class="c-icon mr-2">
                        <use xlink:href="{{asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-av-timer')}}">
                        </use>
                    </svg> Jadwal</a>
                </a>
                @endcanany

                @canany(['admin','pimpinan'])
                <div class="dropdown-header bg-light py-2">
                    <strong>{{ucwords(Auth::user()->role->name)}}</strong>
                </div>
                <a class="dropdown-item" href="{{route(Auth::user()->role->name.'.laporan.jadwal.index')}}">
                    <svg class=" c-icon mr-2">
                        <use xlink:href="{{asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-file')}}"></use>
                    </svg> Laporan Kegiatan Kapal
                </a>

                <a class="dropdown-item" href="{{route(Auth::user()->role->name.'.laporan.dermaga.index')}}">
                    <svg class=" c-icon mr-2">
                        <use xlink:href="{{asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-file')}}"></use>
                    </svg> Laporan Dermaga
                </a>

                <a class="dropdown-item" href="{{route(Auth::user()->role->name.'.laporan.kapal.index')}}">
                    <svg class=" c-icon mr-2">
                        <use xlink:href="{{asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-file')}}"></use>
                    </svg> Laporan Kapal
                </a>

                @endcanany

                <div class=" dropdown-divider">
                </div>


                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                    <svg class="c-icon mr-2">
                        <use xlink:href="coreui/vendors/@coreui/icons/svg/free.svg#cil-account-logout"></use>
                    </svg> Logout</a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
    <div class="c-subheader px-3">
        <!-- Breadcrumb-->
        <ol class="breadcrumb border-0 m-0">
            {{-- <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item active">Dashboard</li> --}}
            <!-- Breadcrumb Menu-->

            <?php $segments = ''; ?>
            @foreach(Request::segments() as $segment)
            <?php
            $segmentText=str_replace('-',' ',$segment);
            $segments .= $segment.'/';
             ?>
            <li class="breadcrumb-item ">

                @if ( Route::current()->uri == rtrim($segments,'/'))
                {{ucwords($segmentText)}}
                @else
                <a href="{{ url($segments) }}">{{ucwords($segmentText)}}</a>
                @endif

            </li>
            @endforeach
    </div>
    </ol>
</header>