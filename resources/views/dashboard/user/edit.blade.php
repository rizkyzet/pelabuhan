@extends('dashboard/layouts/app')

@section('title','Profile ')
@section('content')
@include('dashboard/layouts/_partials/alert')
<div class="card">
    <div class="card-header">
        <h5>My Profile</h5>
    </div>
    <div class="card-body">
        <form action="{{route('admin.user.update',$user)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div
                class="row justify-content-center justify-content-sm-center justify-content-lg-start align-items-center ">

                <div class="col-8 col-lg-5">

                    <div class="form-group">
                        <label for="nama">Email</label>
                        <input type="text" class="form-control" name="email" value="{{old('email',$user->email)}}">
                    </div>
                    @error('email')
                    <small class="text-danger">
                        {{$message}}
                    </small>
                    @enderror
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" name="name" value="{{old('nama',$user->name)}}">
                        @error('name')
                        <small class="text-danger">
                            {{$message}}
                        </small>
                        @enderror

                    </div>
                    <div class="form-group">
                        <label for="nama">Alamat</label>
                        <input type="text" class="form-control" name="alamat" value="{{old('alamat',$user->alamat)}}">
                        @error('alamat')
                        <small class="text-danger">
                            {{$message}}
                        </small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nama">No Handphone</label>
                        <input type="text" class="form-control" name="no_hp" value="{{old('no_hp',$user->no_hp)}}">
                        @error('no_hp')
                        <small class="text-danger d-flex">
                            {{$message}}
                        </small>
                        @enderror

                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="text" class="form-control" name="password">
                        <div
                            class="d-flex @error('password') justify-content-between @else justify-content-end @enderror">
                            @error('password')
                            <small class="text-danger">
                                {{$message}}
                            </small>
                            @enderror
                            <small class="text-muted">
                                *isi jika ingin diubah
                            </small>
                        </div>
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
                            <option value="{{$r->id}}" {{old('role_id',$user->role->id)==$r->id ? 'selected' : ''}}>
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
                    <button type="submit" class="btn btn-primary">Ubah</button>
                </div>
            </div>
        </form>
    </div>
</div>



@endsection