@extends('dashboard.layouts.app')

@section('title','Agen | Dermaga')
@section('content')
@include('dashboard/layouts/_partials/alert')
<div class="card">
    <div class="card-header">
        <h5>Dermaga</h5>
    </div>
    <div class="card-body">
        <div class="mb-3">
            <form class="form-inline" action="{{route('admin.dermaga.update',$dermaga)}}" method="POST">
                @csrf
                @method('patch')
                <div class="input-group mb-2 mr-sm-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Nama</div>
                    </div>
                    <input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="Dermaga"
                        name="nama" value="{{old('nama',$dermaga->nama)}}">
                </div>

                <button type="submit" class="btn btn-primary mb-2">Edit</button>
            </form>
            @error('nama')
            <small class="text-danger">
                {{$message}}
            </small>
            @enderror
        </div>
    </div>
</div>
@endsection