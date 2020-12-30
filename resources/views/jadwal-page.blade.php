@extends('layouts.app')

@section('content')
<div class="container page-container">
    @can('agen')
    <a class="btn btn-primary btn-sm" href="{{route('agen.jadwal.create')}}">Buat Jadwal</a>
    @endcan
    <div class="row mt-5">
        <div class="col"></div>
    </div>


</div>
@endsection