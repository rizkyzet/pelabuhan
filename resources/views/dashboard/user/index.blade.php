@extends('dashboard.layouts.app')

@section('title','User')
@section('content')
@include('dashboard/layouts/_partials/alert')
<div class="card">
    <div class="card-header d-flex">
        <h5>User</h5>
        @can('admin')
        <button class="btn btn-primary btn-sm ml-3">Tambah Agen</button>
        @endcan
    </div>
    <div class="card-body">

        <table class="table" id="dt">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Role</th>
                    <th scope="col">Nama</th>
                    @can('admin')
                    <th scope="col" style="width: 20%">Aksi</th>
                    @endcan
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $u)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$u->role->name}}</td>
                    <td>{{$u->name}}</td>
                    @can('admin')
                    <td>
                        <a href="" class="btn btn-success btn-sm">Update</a>
                        <form action="" method="POST" class="d-inline">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-sm btn-danger"
                                onclick="return confirm('yakin ingin hapus?')">Delete</button>
                        </form>

                    </td>
                    @endcan
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection