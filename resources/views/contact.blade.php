@extends('layouts.app')

@section('content')
<div class="container page-container">
    <h1>Contact Us</h1>
    @if (session()->has('success'))
    <div class="alert alert-success">
        {{session()->get('success')}}
    </div>
    @endif
    <div class="row row-page px-5">
        <div class="col-12 col-lg-6 order-2 order-lg-1 px-5 py-4 ">
            <h1 class="mb-3">Company<span> Contact</span></h1>
            <p>
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laudantium ipsum similique numquam. Impedit
                veritatis veniam odit omnis fugit repudiandae atque?
            </p>
            <div class="form-group">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <div class="input-group-text"> <svg style="width: 20px;height:25px;">
                                <use xlink:href="{{asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-contact')}}">
                                </use>
                            </svg></div>
                    </div>
                    <input type="text" class="form-control disable" id="inlineFormInputGroup" value="" readonly>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <div class="input-group-text"> <svg style="width: 20px;height:25px;">
                                <use xlink:href="{{asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-phone')}}">
                                </use>
                            </svg></div>
                    </div>
                    <input type="text" class="form-control disable" id="inlineFormInputGroup" value="" readonly>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <div class="input-group-text"> <svg style="width: 20px;height:25px;">
                                <use
                                    xlink:href="{{asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-location-pin')}}">
                                </use>
                            </svg></div>
                    </div>
                    <input type="text" class="form-control disable" id="inlineFormInputGroup" value="" readonly>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6 order-1 order-lg-2 shadow-lg py-4 px-5">
            <h1 class="mb-3">Say <span>Something</span></h1>
            <form action="{{route('contact.send')}}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="text" name="subject" class="form-control" placeholder="Your Subject">
                    @error('subject')
                    <small class="text-danger">
                        {{$message}}
                    </small>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="text" name="email" class="form-control" placeholder="Your Email">
                    @error('email')
                    <small class="text-danger">
                        {{$message}}
                    </small>
                    @enderror
                </div>
                <div class="form-group">
                    <textarea name="message" id="" cols="30" rows="10" class="form-control"></textarea>
                    @error('message')
                    <small class="text-danger">
                        {{$message}}
                    </small>
                    @enderror
                </div>
                <button class="btn btn-block btn-danger" type="submit">Kirim</button>
            </form>
        </div>
    </div>

</div>

@endsection