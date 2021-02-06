<nav class="navbar navbar-expand-lg navbar-dark bg-light">
    <a class="navbar-brand" href="/"> {{ config('app.name', 'Laravel') }}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="container justify-content-center">
            <div class="navbar-nav">

                <a href="{{route('home')}}" class="nav-link">Profile</a>
                <a href="{{route('contact.index')}}" class="nav-link">Contact</a>

                @if(Auth::check())
                <a href="{{route(Auth::user()->role->name.'.jadwal.create')}}" class="nav-link">Jadwal</a>
                @else
                <a href="{{route('jadwal.create')}}" class="nav-link">Jadwal</a>
                @endif
            </div>
        </div>

        @guest
        <div class="navbar-nav ml-auto text-center">
            <a class="nav-link" href="{{route('register')}}">Register</a>
            <a class="nav-link" href="{{route('login')}}">Login</a>
        </div>
        @else
        <div class="navbar-nav ml-auto text-center">
            <li class="nav-item dropdown">

                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{Auth::user()->name}}
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    @if (Auth::user()->hasRole('agen'))
                    <a href="{{route('agen')}}" class="dropdown-item">Halaman Agen</a>
                    @elseif(Auth::user()->hasRole('admin'))
                    <a href="{{route('admin')}}" class="dropdown-item">Dashboard Admin</a>
                    @elseif(Auth::user()->hasRole('pimpinan'))
                    <a href="{{route('pimpinan')}}" class="dropdown-item">Dashboard Pimpinan</a>
                    @endif
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        </div>
        @endguest


    </div>
</nav>