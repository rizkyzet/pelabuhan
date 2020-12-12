@extends('layouts.app')

@section('content')
<div class="container page-container">
    <div class="row mt-5">
        <div class="col-6">
            <div class="form-group">
                <label for="start">Pilih Bulan:</label>
                <input type="month" id="start" name="start" min="{{date('Y-01')}}" value="{{date('Y-m')}}"
                    class="form-control">
            </div>
        </div>
    </div>


</div>
@endsection