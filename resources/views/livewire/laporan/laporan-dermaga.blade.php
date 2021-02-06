<div>
    <div>
        <div class="card">
            <h5 class="card-header">Laporan Dermaga</h5>
            <div class="card-body">

                <form action="{{route(Auth::user()->role->name.'.laporan.dermaga.cetak')}}" method="POST"
                    target="_blank">
                    @csrf
                    <div class="form-row">
                        <div class="col-3">
                            <select wire:model="idDermaga" class="form-control" name="id_dermaga">
                                <option value="all">Pilih Dermaga</option>
                                @foreach ($dermaga as $d)
                                <option value="{{$d->id}}">{{$d->nama}}</option>
                                @endforeach
                            </select>
                            @error('idDermaga')
                            <small class="text-danger">
                                {{$message}}
                            </small>
                            @enderror
                            @error('id_dermaga')
                            <small class="text-danger">
                                {{$message}}
                            </small>
                            @enderror
                        </div>
                        <div class="col-1 ml-auto text-right">
                            <button type="submit" class="btn btn-primary ">Cetak</button>
                        </div>
                    </div>
                </form>

                <table class="table table-sm table-hovered table-striped mt-2">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>ID Dermaga</th>
                            <th>Nama</th>
                            <th>Kapal Masuk</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataDermaga as $d)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$d->id}}</td>
                            <td>{{$d->nama}}</td>
                            <td>{{count($d->jadwal)}}</td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>