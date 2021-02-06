@extends('dashboard.layouts.app')

@section('title','Jadwal')
@section('content')
@include('dashboard/layouts/_partials/alert')
<div class="card">
    <div class="card-header d-flex">
        <h5>Jadwal</h5>

    </div>
    <div class="card-body">
        @can('agen')
        <a href="{{route('agen.jadwal.create')}}" class="btn btn-primary mb-2">Daftar Jadwal</a>
        @endcan
        @can('admin')
        <a href="{{route('jadwal.cek')}}" class="btn btn-success btn-sm mb-2">Cek Status</a>
        @endcan
        <table class="table" id="dt">
            <thead>

                <tr>
                    <th>No.</th>
                    @if(Auth::user()->role->name =='admin'||Auth::user()->role->name =='pimpinan')
                    <th>Nama Agen</th>
                    @endif
                    <th>Waktu buat</th>
                    <th>Order ID</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jadwal as $j)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    @if(Auth::user()->role->name =='admin'||Auth::user()->role->name =='pimpinan')
                    <td>{{$j->user->name}}</td>
                    @endif
                    @if (date('Y-m-d',strtotime('now -1 day'))==date('Y-m-d',strtotime($j->created_at)))
                    <td>{{'Kemarin, '.date('H:i:s',strtotime($j->created_at))}}</td>
                    @else
                    <td>{{date('Y-m-d',strtotime($j->created_at))}} </td>
                    @endif
                    <td>{{$j->order_id}}</td>
                    <td>{{rupiah($j->harga)}}</td>
                    @if ($j->status=='pending')
                    <td><span class="badge badge-warning">{{$j->status}}</span></td>
                    @elseif($j->status=='settlement')
                    <td><span class="badge badge-success">{{$j->status}}</span></td>
                    @else
                    <td><span class="badge badge-danger">{{$j->status}}</span></td>
                    @endif

                    <td>
                        <div class="d-flex">

                            <a href="{{route('agen.jadwal.show',$j)}}" class="btn btn-success btn-sm mr-2">
                                Detail
                            </a>
                            @can('admin')
                            <form action="{{route('admin.jadwal.delete',$j)}}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                            @endcan
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>

    </div>
</div>
@endsection