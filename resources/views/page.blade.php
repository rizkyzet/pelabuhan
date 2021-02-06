<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Viga&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/page.css')}}">
    <title>{{config('app.name')}}</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-light">
        <a class="navbar-brand" href="#"> {{ config('app.name', 'Laravel') }}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="container justify-content-center">
                <div class="navbar-nav ">

                    <a href="" class="nav-link">Profile</a>
                    <a href="" class="nav-link">About</a>
                    <a href="" class="nav-link">Contact</a>
                    <a href="" class="nav-link">Jadwal</a>
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
                        @if (Auth::user()->hasRole('user'))
                        <a href="{{route('user')}}" class="dropdown-item">Dashboard User</a>
                        @elseif(Auth::user()->hasRole('admin'))
                        <a href="{{route('admin')}}" class="dropdown-item">Dashboard Admin</a>
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

    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            {{-- @dump(asset('/img/jumbotron.png'))
            <h1 class="display-4">Fluid jumbotron</h1>
            <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p> --}}
        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6 order-2 order-lg-1 ">
                <h1>Who Are <span>We</span></h1>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eveniet reiciendis temporibus voluptate
                    asperiores repellat quidem fugit qui accusamus adipisci autem tenetur inventore, eius quasi
                    laboriosam odio dicta assumenda sint amet veritatis quam nihil. Sint porro rerum excepturi iusto
                    nostrum sapiente ad dignissimos tenetur blanditiis. Cumque fugit sed dolorem consequuntur, id illo
                    non quae voluptate, voluptatem aut ex maxime debitis vel itaque voluptas quisquam, aperiam magni
                    harum reiciendis perspiciatis optio. Pariatur explicabo veniam .</p>
            </div>
            <div class="col-12 col-lg-6 text-center order-1 order-lg-2">
                <img src="/img/row-1.png" alt="">
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-lg-6 order-2 ">
                <h1>We <span>Service</span></h1>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eveniet reiciendis temporibus voluptate
                    asperiores repellat quidem fugit qui accusamus adipisci autem tenetur inventore, eius quasi
                    laboriosam odio dicta assumenda sint amet veritatis quam nihil. Sint porro rerum excepturi iusto
                    nostrum sapiente ad dignissimos tenetur blanditiis. Cumque fugit sed dolorem consequuntur, id illo
                    non quae voluptate, voluptatem aut ex maxime debitis vel itaque voluptas quisquam, aperiam magni
                    harum reiciendis perspiciatis optio. Pariatur explicabo veniam .</p>
                <a href="" class="btn btn-danger float-right">Daftar</a>
            </div>
            <div class="col-12 col-lg-6 text-center">
                <img src="/img/row-2.png" alt="">
            </div>

        </div>

        <div class="row">
            <div class="col-12 col-lg-6 order-2 order-lg-1 ">
                <h1>Join <span>Us</span></h1>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eveniet reiciendis temporibus voluptate
                    asperiores repellat quidem fugit qui accusamus adipisci autem tenetur inventore, eius quasi
                    laboriosam odio dicta assumenda sint amet veritatis quam nihil. Sint porro rerum excepturi iusto
                    nostrum sapiente ad dignissimos tenetur blanditiis. Cumque fugit sed dolorem consequuntur, id illo
                    non quae voluptate, voluptatem aut ex maxime debitis vel itaque voluptas quisquam, aperiam magni
                    harum reiciendis perspiciatis optio. Pariatur explicabo veniam .</p>
            </div>
            <div class="col-12 col-lg-6 text-center order-1 order-lg-2">
                <img src="/img/row-3.png" alt="">
            </div>
        </div>
    </div>
    <div class="footer text-center text-white">
        <small>
            © 2020 Copyright by PT Pelabuhan Indonesia III (Persero). All rights reserved.
        </small>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
</body>

</html>