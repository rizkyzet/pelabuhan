@extends('dashboard.layouts.app')

@section('title','Kapal | Edit')
@section('content')
@include('dashboard/layouts/_partials/alert')
<div class="card">
    <div class="card-header">
        <h5>Kapal</h5>
    </div>
    <div class="card-body">
        <div class="mb-3">
            <form class="form-inline" action="{{route('admin.kapal.update',$kapal)}}" method="POST">
                @csrf
                @method('patch')
                <div class="input-group mb-2 mr-sm-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Jenis</div>
                    </div>
                    <input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="Kapal"
                        name="jenis" value="{{old('jenis',$kapal->jenis)}}">
                </div>

                <button type="submit" class="btn btn-primary mb-2">Edit</button>
            </form>
            @error('jenis')
            <small class="text-danger">
                {{$message}}
            </small>
            @enderror
        </div>
    </div>
</div>
@endsection