<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
    <div class="c-sidebar-brand d-lg-down-none">
        <div class="c-sidebar-brand-full">
            <a href="/" class="text-white" style="text-decoration: none;">
                <h2>PELINDO</h2>
            </a>
        </div>
        <div class="c-sidebar-brand-minimized">
            <h1>P</h1>
        </div>
    </div>
    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            @if (Auth::user()->role->name=='admin')
            <a class="c-sidebar-nav-link " href="{{route('admin.dashboard')}}">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-speedometer')}}"></use>
                </svg> Dashboard
            </a>
            @elseif(Auth::user()->role->name == 'pimpinan')
            <a class="c-sidebar-nav-link " href="{{route('pimpinan.dashboard')}}">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-speedometer')}}"></use>
                </svg> Dashboard
            </a>
            @endif
        </li>
        <li class="c-sidebar-nav-title">Account</li>
        <li class="c-sidebar-nav-item">
            @if (Auth::user()->role->name == 'admin')
            <a class="c-sidebar-nav-link {{Route::current()->uri == route('agen') ? 'c-active' : '' }}"
                href="{{route('admin')}}">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-user')}}"></use>
                </svg> My Profile
            </a>
            @elseif(Auth::user()->role->name == 'agen')
            <a class="c-sidebar-nav-link {{Route::current()->uri == route('agen') ? 'c-active' : '' }}"
                href="{{route('agen')}}">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-user')}}"></use>
                </svg> My Profile
            </a>
            @elseif(Auth::user()->role->name == 'pimpinan')
            <a class="c-sidebar-nav-link {{Route::current()->uri == route('pimpinan') ? 'c-active' : '' }}"
                href="{{route('pimpinan')}}">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-user')}}"></use>
                </svg> My Profile
            </a>
            @endif

        </li>
        @if (Auth::user()->role->name == 'agen')
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link {{Route::current()->uri == route('agen.password') ? 'c-active' : '' }}"
                href="{{route('agen.password')}}">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-lock-locked')}}"></use>
                </svg> Ubah Password
            </a>
        </li>
        @elseif (Auth::user()->role->name == 'admin')
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link {{Route::current()->uri == route('admin.password') ? 'c-active' : '' }}"
                href="{{route('admin.password')}}">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-lock-locked')}}"></use>
                </svg> Ubah Password
            </a>
        </li>
        @elseif (Auth::user()->role->name == 'pimpinan')
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link {{Route::current()->uri == route('pimpinan.password') ? 'c-active' : '' }}"
                href="{{route('pimpinan.password')}}">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-lock-locked')}}"></use>
                </svg> Ubah Password
            </a>
        </li>
        @endif
        <li class="c-sidebar-nav-title">{{Auth::user()->role->name}}</li>
        @canany(['admin','pimpinan'])
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link"
                href="{{route(Auth::user()->role->name.'.user.index')}}">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-people')}}"></use>
                </svg> Users</a></li>
        @endcanany

        @canany(['admin','pimpinan'])
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link"
                href="{{route(Auth::user()->role->name.'.dermaga.index')}}">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-boat-alt')}}"></use>
                </svg> Dermaga</a></li>
        @endcanany


        @canany(['admin','pimpinan','agen'])
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link"
                href="{{route(Auth::user()->role->name.'.jadwal.index')}}">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-av-timer')}}"></use>
                </svg> Jadwal</a></li>
        @endcanany

    </ul>
    <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent"
        data-class="c-sidebar-minimized"></button>
</div>