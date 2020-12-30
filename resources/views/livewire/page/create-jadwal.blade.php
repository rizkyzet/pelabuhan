<div>

    <div class="form-group">
        <label for="start">Pilih Tanggal:</label>
        <input type="date" id="start" name="tanggal" class="form-control" wire:model="tanggal">
    </div>


    <table class="table table-bordered table-hover table-sm">
        <tr>
            <th colspan="2" class="text-center">Waktu</th>
            @foreach(\App\Dermaga::all() as $d)
            <th>{{$d->nama}}</th>
            @endforeach
        </tr>

        @foreach ($time as $t)
        <tr>
            <td>{{date('Y-m-d',strtotime($t['waktu_mulai']))}} &mdash;
                <strong>{{date('H:i:s',strtotime($t['waktu_mulai']))}}
            </td>
            <td>{{date('Y-m-d',strtotime($t['waktu_selesai']))}} &mdash;
                <strong>{{date('H:i:s',strtotime($t['waktu_selesai']))}}</td>
            @foreach ($t['cek'] as $cek)
            @if ($cek['status']=='expired')
            <td><a href="" class="btn btn-sm btn-danger disabled">{{$cek['status']}}</a></td>
            @elseif($cek['status']=='booked')
            <td><a href="" class="btn btn-sm btn-primary disabled">{{$cek['status']}}</a></td>
            @else
            <td>
                <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#exampleModal"
                    wire:click="booking('{{$t['waktu_mulai']}}','{{$cek['dermaga']}}','{{$cek['dermaga_id']}}')">
                    {{$cek['status']}}
                </button>
            </td>
            @endif
            @endforeach
        </tr>
        @endforeach


    </table>



    <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true" data-backdrop="static">

        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">

                    <h5 class="modal-title" id="exampleModalLabel">{{$dermaga}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="form-bayar" method="POST" wire:submit.prevent="token" action="{{route('agen.jadwal.store')}}">
                    @csrf
                    <div class="modal-body">
                        <div class="form-row mb-3">
                            <div class="col">
                                <label>Waktu Mulai</label>
                                <input type="text" class="form-control" wire:model="setWaktuMulai" name="waktu_mulai"
                                    readonly>
                            </div>
                            <div class="col">
                                <label>Waktu Selesai</label>
                                <input type="text" class="form-control" wire:model="setWaktuSelesai"
                                    name="waktu_selesai" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Jenis Kapal</label>
                            <select wire:model="kapal" class="form-control" name="kapal_id">
                                <option value="">Pilih Kapal</option>
                                @foreach (\App\Kapal::all() as $k)
                                <option value="{{$k->id}}">{{$k->jenis}}</option>
                                @endforeach
                            </select>

                            @error('kapal')
                            <small class="text-danger">
                                {{$message}}
                            </small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Jumlah Muatan</label>
                            <input type="number" class="form-control" wire:model="muatan" min="1" name="muatan">
                            @error('muatan')
                            <small class="text-danger">
                                {{$message}}
                            </small>
                            @enderror
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <label for="">Harga</label>

                                <input type="text" class="form-control disabled" wire:model="harga" readonly
                                    name="harga">
                                @error('harga')
                                <small class="text-danger">
                                    {{$message}}
                                </small>
                                @enderror
                            </div>
                            <div class="col-1 align-self-end">
                                <div class="spinner-grow text-primary  ml-2" role="status" wire:loading
                                    wire:target="muatan">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="order_id">
                        <input type="hidden" name="dermaga_id" value="{{$dermaga_id}}">
                        <input type="hidden" id='result-data' name="result_data">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        window.addEventListener('midtrans-token', event => {

function changeResult(data,order_id){
$("#result-data").val(JSON.stringify(data));
$("input[name=order_id]").val(order_id);

}
snap.pay(event.detail.token, {

onSuccess: function(result){
;
changeResult( result,result.order_id);
console.log(result.status_message);
console.log(result);
$("#form-bayar").submit();
},
onPending: function(result){
changeResult(result,result.order_id);
console.log(result.status_message);
console.log(result);
$("#form-bayar").submit();
},
onError: function(result){
changeResult(result,result.order_id);
console.log(result.status_message);
console.log(result);
$("#form-bayar").submit();
}
});
})
  
     

    </script>
</div>