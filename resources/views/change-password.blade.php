@extends('dashboard/layouts/app')

@section('title','Ubah Password')
@section('content')
@include('dashboard/layouts/_partials/alert')
<div class="card">
    <div class="card-header">
        <h5>Ubah Password</h5>
    </div>
    <div class="card-body">
        <form action="{{route('profile.update',['type'=>'password'])}}" method="POST">
            @csrf
            @method('patch')
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="password">Password Baru</label>
                        <input type="password" name="password" id="password" class="form-control"
                            value="{{$errors->has('password') ? '' : old('password','')}}">
                        @error('password')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            class="form-control">
                        @error('password_confirmation')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="old_password">Password Lama</label>
                        <input type="password" name="old_password" id="old_password" class="form-control"
                            value="{{$errors->has('old_password') ? '' : old('old_password','')}}">
                        @error('old_password')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Ubah</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection