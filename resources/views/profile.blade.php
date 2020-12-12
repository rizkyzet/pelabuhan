@extends('dashboard/layouts/app')

@section('content')
@include('dashboard/layouts/_partials/alert')
<div class="card">
    <div class="card-header">
        <h5>My Profile</h5>
    </div>
    <div class="card-body">
        <form action="{{route('profile.update',['type'=>'info'])}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div
                class="row justify-content-center justify-content-sm-center justify-content-lg-start align-items-center ">
                <div class="col-8 col-lg-2 d-flex justify-content-center flex-column mb-3 order-lg-2">
                    <img src="{{asset('storage/'.$user->foto)}}" alt="" class="img-thumbnail img-preview">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="foto" name="foto">
                        <label class="custom-file-label" for="foto">Pilih Gambar</label>
                    </div>
                    @error('foto')
                    <small class="text-danger">
                        {{$message}}
                    </small>
                    @enderror
                </div>
                <div class="col-8 col-lg-5">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" value="{{$user->name}}" name="name">
                        @error('name')
                        <small class="text-danger">
                            {{$message}}
                        </small>
                        @enderror

                    </div>
                    <div class="form-group">
                        <label for="nama">Alamat</label>
                        <input type="text" class="form-control" value="{{$user->alamat}}" name="alamat">
                        @error('alamat')
                        <small class="text-danger">
                            {{$message}}
                        </small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nama">No Handphone</label>
                        <input type="text" class="form-control" value="{{$user->no_hp}}" name="no_hp">
                        @error('no_hp')
                        <small class="text-danger">
                            {{$message}}
                        </small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="nama">Email</label>
                        <input type="text" class="form-control" value="{{$user->email}}" name="email" disabled>
                    </div>
                    <div class="form-group">
                        <label for="nama">Status Akun</label>
                        <input type="text" class="form-control disabled" value="{{ucwords($user->role->name)}}"
                            name="role_id" disabled>
                    </div>
                    <button type="submit" class="btn btn-primary">Ubah</button>
                </div>
            </div>
        </form>
    </div>
</div>



@endsection