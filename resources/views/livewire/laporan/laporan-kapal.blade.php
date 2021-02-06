<div>
    <div class="card">
        <h5 class="card-header">Laporan Kapal</h5>
        <div class="card-body">

            {{-- <form action="{{route(Auth::user()->role->name.'.laporan.kapal.cetak')}}" method="POST"
            target="_blank">
            @csrf
            <div class="form-row">
                <div class="col-2">
                    <select wire:model="idKapal" class="form-control" name="id_kapal">
                        <option value=" ">Pilih Kapal</option>
                        @foreach ($kapal as $k)
                        <option value="{{$k->id}}">{{$k->jenis}}</option>
                        @endforeach
                    </select>
                    @error('idKapal')
                    <small class="text-danger">
                        {{$message}}
                    </small>
                    @enderror
                    @error('id_kapal')
                    <small class="text-danger">
                        {{$message}}
                    </small>
                    @enderror
                </div>
                <div class="col-1 ml-auto text-right">
                    <button type="submit" class="btn btn-primary ">Cetak</button>
                </div>
            </div>
            </form> --}}

            <a href="{{route(Auth::user()->role->name.'.laporan.kapal.cetak2')}}"
                class="btn btn-primary float-right">Cetak</a>

            <table class="table table-sm table-hovered table-striped mt-2">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>ID Kapal</th>
                        <th>Jenis Kapal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataKapal as $k)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$k->id}}</td>
                        <td>{{$k->jenis}}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="3" align="right"><strong>Jumlah : </strong>{{count($dataKapal)}}</td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
</div>