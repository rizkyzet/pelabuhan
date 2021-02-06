@extends('dashboard.layouts.app')

@section('title','Jadwal')
@section('content')
@include('dashboard/layouts/_partials/alert')

@can('print',$jadwal)
@if ($jadwal->status=='settlement')
<div class="clearfix">
    <a href="{{route('agen.jadwal.print',$jadwal)}}" class="btn btn-success mb-3 float-right ">
        <svg style="width: 15px;height:15px;">
            <use xlink:href="{{asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-print')}}"></use>
        </svg>
        Cetak
    </a>
</div>
@endif
@endcan
<div class="row ">
    <div class="col">
        <div class="card">
            <div class="card-header">
                Informasi Jadwal
            </div>
            <div class="card-body">
                <div class="d-flex flex-sm-row flex-column ">
                    <div class="flex-fill p-2">
                        <h5>Waktu Mulai</h5>
                        <p>{{$jadwal->waktu_mulai}}</p>
                    </div>
                    <div class="flex-fill p-2">
                        <h5>Waktu Selesai</h5>
                        <p>{{$jadwal->waktu_selesai}}</p>
                    </div>
                    <div class="flex-fill p-2">
                        <h5>Kapal</h5>
                        <p>{{$jadwal->kapal->jenis}}</p>
                    </div>
                    <div class="flex-fill p-2">
                        <h5>Dermaga</h5>
                        <p>{{$jadwal->dermaga->nama}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                Informasi Pembayaran&nbsp;
                @if ($jadwal->status=='settlement')
                <span class="badge badge-success">{{$jadwal->status}}</span>
                @elseif($jadwal->status=='pending')
                <span class="badge badge-warning">{{$jadwal->status}}</span>
                @else
                <span class="badge badge-danger">{{$jadwal->status}}</span>
                @endif
            </div>
            <div class="card-body">
                <table class="table-sm">
                    <tr>
                        <th>Order ID</th>
                        <td>{{$jadwal->order_id}}</td>
                    </tr>
                    <tr>
                        <th>Bank</th>
                        <td>{{$jadwal->bank}}</td>
                    </tr>
                    <tr>
                        <th>Va Number</th>
                        <td>{{$jadwal->va_number}}</td>
                    </tr>
                    <tr>
                        <th>Jumlah Muatan</th>
                        <td>{{$jadwal->jumlah_muatan}}</td>
                    </tr>
                    <tr>
                        <th>Total Bayar</th>
                        <td>{{ rupiah($jadwal->harga)}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card">
            <div class="card-header">
                Informasi Agen&nbsp;
            </div>
            <div class="card-body">
                <table class="table-sm">
                    <tr>
                        <th>Nama</th>
                        <td>{{$jadwal->user->name}}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{$jadwal->user->email}}</td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>{{$jadwal->user->alamat}}</td>
                    </tr>
                    <tr>
                        <th>No. Handphone</th>
                        <td>{{$jadwal->user->no_hp}}</td>
                    </tr>

                </table>
            </div>
        </div>
    </div>
</div>
@endsection