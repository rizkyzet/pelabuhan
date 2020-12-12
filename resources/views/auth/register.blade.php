@extends('auth/layouts/app')
@section('content-auth')
<div class="container">
    <div class="card card-register border shadow-lg px-3 py-5 ">
        <a href="{{route('home')}}" class="mx-auto">
            <img class="logo " src="/img/logo.png" alt="">
        </a>
        <div class="card-body">
            @include('dashboard/layouts/_partials/alert')
            <form action="{{route('register')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}" autocomplete="name" autofocus
                                value="{{old('nama')}}">

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" autocomplete="email" value="{{old('email')}}">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password"
                                autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password-confirm">Confirm Password</label>
                            <input id="password-confirm" type="password" class="form-control"
                                name="password_confirmation" autocomplete="new-password">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input id="alamat" type="text" class="form-control  @error('alamat') is-invalid @enderror"
                                name="alamat" autocomplete="alamat" value="{{old('alamat')}}">
                            @error('alamat')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="form-group">
                            <label for="no_hp">No Handphone</label>
                            <input id="no_hp" type="text" class="form-control  @error('no_hp') is-invalid @enderror"
                                name="no_hp" autocomplete="no_hp" value="{{old('no_hp')}}">
                            @error('no_hp')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-danger mt-3">Register</button>
                <div class="d-flex flex-column text-center justify-content-center mt-3">
                    <a href="{{route('login')}}" class="py-0 px-0 login-anchor">Login</a>
                    <a href="{{route('password.request')}}" class="py-0 px-0 login-anchor">Lupa Password?</a>
                    <a href="{{route('home')}}" class="py-0 px-0 login-anchor">Back to home</a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection