@extends('dashboard.layouts.app')

@section('title','Dermaga')
@section('content')
@include('dashboard/layouts/_partials/alert')
<div class="card">
    <div class="card-header">
        <h5>Dermaga</h5>
    </div>
    <div class="card-body">
        <div class="mb-3">
            <form class="form-inline" action="{{route('admin.dermaga.tambah')}}" method="POST">
                @csrf
                @can('admin')
                <div class="input-group mb-2 mr-sm-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Nama</div>
                    </div>
                    <input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="Dermaga"
                        name="nama">
                </div>

                <button type="submit" class="btn btn-primary mb-2">Tambah</button>

                @endcan
            </form>
            @error('nama')
            <small class="text-danger">
                {{$message}}
            </small>
            @enderror
        </div>
        <table class="table" id="dt">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    @can('admin')
                    <th scope="col" style="width: 20%">Aksi</th>
                    @endcan
                </tr>
            </thead>
            <tbody>
                @foreach ($dermaga as $d)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$d->nama}}</td>
                    @can('admin')
                    <td>
                        <a href="{{route('admin.dermaga.edit',$d)}}" class="btn btn-success btn-sm">Update</a>
                        <form action="{{route('admin.dermaga.delete',$d)}}" method="POST" class="d-inline">
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