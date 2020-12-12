@extends('auth/layouts/app')
@section('content-auth')
<div class="container">
    <div class="card card-verify shadow-lg px-3 py-5 ">
        <a href="{{route('home')}}" class="mx-auto">
            <img class="logo " src="/img/logo.png" alt="">
        </a>
        <div class="card-body clearfix">
            <h4>Verifikasi Email Anda</h4>
            <p>
                Silahkan cek email anda untuk verifikasi, <strong>klik kirim ulang jika anda tidak mendapat email dari
                    kami.</strong>
            </p>
            <div class="row justify-content-between ">
                <div class="col-6 col-lg-4 mt-3">

                    <form method="POST" action="{{ route('verification.resend') }}" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-kirim-v">Kirim
                        </button>
                    </form>
                </div>
                <div class="col-6 col-lg-4 d-flex justify-content-end mt-3">
                    <form action="{{ route('logout') }}" method="POST" class="align-items-stretch">
                        @csrf
                        <button type=" submit" class="btn btn-logout-v">Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection