@extends('auth.layouts.app')

@section('content-auth')
<div class="card card-email border shadow-lg px-3 py-5 ">
    <a href="{{route('home')}}" class="mx-auto">
        <img class="logo " src="/img/logo.png" alt="">
    </a>
    <div class="card-body clearfix">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            Email Terkirim ! Silahkan Cek email Anda!
        </div>
        @endif
        <form action="{{route('password.email')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" autocomplete="email" autofocus>

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="clearfix">
                <button class="btn btn-danger mt-3 float-right btn-login py-1" type="submit">Kirim</button>
            </div>
            <div class="d-flex flex-column text-center justify-content-center mt-4">
                <a href="{{route('login')}}" class="py-0 px-0 login-anchor">Login</a>
                <a href="{{route('register')}}" class="py-0 px-0 login-anchor">Register</a>
                <a href="{{route('home')}}" class="py-0 px-0 login-anchor">Back to home</a>
            </div>
        </form>
    </div>
</div>
@endsection