@extends('dashboard/layouts/app')

@section('title','Profile ')
@section('content')
@include('dashboard/layouts/_partials/alert')
<div class="card">
    <div class="card-header">
        <h5>My Profile</h5>
    </div>
    <div class="card-body">
        <form action="{{route('admin.user.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div
                class="row justify-content-center justify-content-sm-center justify-content-lg-start align-items-center ">

                <div class="col-8 col-lg-5">

                    <div class="form-group">
                        <label for="nama">Email</label>
                        <input type="text" class="form-control" name="email" value="{{old('email')}}">
                    </div>
                    @error('email')
                    <small class="text-danger">
                        {{$message}}
                    </small>
                    @enderror
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" name="name" value="{{old('nama')}}">
                        @error('name')
                        <small class="text-danger">
                            {{$message}}
                        </small>
                        @enderror

                    </div>
                    <div class="form-group">
                        <label for="nama">Alamat</label>
                        <input type="text" class="form-control" name="alamat" value="{{old('alamat')}}">
                        @error('alamat')
                        <small class="text-danger">
                            {{$message}}
                        </small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nama">No Handphone</label>
                        <input type="text" class="form-control" name="no_hp" value="{{old('no_hp')}}">
                        @error('no_hp')
                        <small class="text-danger">
                            {{$message}}
                        </small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="text" class="form-control" name="password">
                        @error('password')
                        <small class="text-danger">
                            {{$message}}
                        </small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Konfirmasi Password</label>
                        <input type="text" class="form-control" name="password_confirmation">

                    </div>

                    <div class="form-group">
                        <label for="nama">Role</label>
                        <select name="role_id" class="form-control">
                            <option value="">Pilih Role</option>
                            @foreach ($role as $r)
                            <option value="{{$r->id}}" {{old('role_id')==$r->id ? 'selected' : ''}}>
                                {{ucwords($r->name)}}
                            </option>
                            @endforeach
                        </select>
                        @error('role_id')
                        <small class="text-danger">
                            {{$message}}
                        </small>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </div>
        </form>
    </div>
</div>



@endsection