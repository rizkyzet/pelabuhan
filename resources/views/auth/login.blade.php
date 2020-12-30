@extends('auth/layouts/app')

@section('content-auth')
<div class="container">
    <div class="card card-login border shadow-lg px-3 py-5 ">
        @include('dashboard/layouts/_partials/alert')
        <a href="{{route('home')}}" class="mx-auto">
            <img class="logo " src="/img/logo.png" alt="">
        </a>
        <div class="card-body clearfix">
            <form action="{{route('login')}}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group mt-5">
                    <label for="password">Password</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required autocomplete="current-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="clearfix">
                    <button class="btn btn-danger mt-3 float-right btn-login py-1" type="submit">Login</button>
                </div>
                <div class="d-flex flex-column text-center justify-content-center py-2">
                    <a href="{{route('register')}}" class="py-0 px-0 login-anchor">Register</a>
                    <a href="{{route('password.request')}}" class="py-0 px-0 login-anchor">Lupa Password?</a>
                    <a href="{{route('home')}}" class="py-0 px-0 login-anchor">Back to home</a>
                </div>
            </form>
        </div>
    </div>
    @endsection