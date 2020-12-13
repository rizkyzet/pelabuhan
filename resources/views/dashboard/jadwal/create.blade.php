@extends('layouts.app')

@section('content')
<div class="container page-container">
    <h4 class="font-weight-bold">Buat Jadwal</h4>
    <div class="row mt-5 justify-content-center">
        <div class="col-8">
            @livewire('page.create-jadwal')
        </div>
    </div>


</div>
@endsection