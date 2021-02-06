<div>
    <div class="card">
        <h5 class="card-header">Laporan Kegiatan Kapal</h5>
        <div class="card-body">

            <form method="POST" action={{route(Auth::user()->role->name.'.laporan.jadwal.cetak')}} target="_blank">
                @csrf
                <div class="form-row align-items-center ">
                    <div class="col-auto">
                        <input type="date" class="form-control mb-1" wire:model="tanggalMulai" name="tanggalMulai">
                        @error('tanggalMulai')
                        <small class="text-danger">
                            {{$message}}
                        </small>
                        @enderror
                    </div>
                    <div class="col-auto">
                        <strong>
                            &mdash;
                        </strong>
                    </div>
                    <div class="col-auto">
                        <input type="date" class="form-control mb-1" wire:model="tanggalAkhir" name="tanggalAkhir">
                        @error('tanggalAkhir')
                        <small class="text-danger">
                            {{$message}}
                        </small>
                        @enderror
                    </div>
                    <div class="col-auto ml-auto">
                        <button type="submit" class="btn btn-primary mb-2">Cetak</button>
                    </div>
                </div>
            </form>

            <table class="table table-hovered table-striped table-sm mt-2">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Order ID</th>
                        <th>Dermaga</th>
                        <th>Kapal</th>
                        <th>Waktu Mulai</th>
                        <th>Waktu Selesai</th>
                        <th>Biaya</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jadwal as $j)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$j->order_id}}</td>
                        <td>{{$j->dermaga->nama}}</td>
                        <td>{{$j->kapal->jenis}}</td>
                        <td>{{$j->waktu_mulai}}</td>
                        <td>{{$j->waktu_selesai}}</td>
                        <td>{{$j->harga}}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="7" align="right"><strong>Total : <strong>{{$jadwal?$jadwal->sum('harga'):''}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>