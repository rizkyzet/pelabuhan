<div>

    <div class="form-group">
        <label for="start">Pilih Tanggal:</label>
        <input type="date" id="start" name="tanggal" class="form-control" wire:model="tanggal">
    </div>


    <table class="table table-bordered table-hover">
        <tr>
            <th colspan="2" class="text-center">Waktu</th>
            <th>Status</th>
        </tr>

        @foreach ($time as $t)
        <tr>
            <td>{{date('Y-m-d',strtotime($t['waktu_mulai']))}} &mdash;
                <strong>{{date('H:i:s',strtotime($t['waktu_mulai']))}}
            </td>
            <td>{{date('Y-m-d',strtotime($t['waktu_selesai']))}} &mdash;
                <strong>{{date('H:i:s',strtotime($t['waktu_selesai']))}}</td>
            @if ($t['status']=='expired')
            <td><a href="" class="btn btn-sm btn-danger">{{$t['status']}}</a></td>
            @elseif($t['status']=='booked')
            <td><a href="" class="btn btn-sm btn-primary disabled">{{$t['status']}}</a></td>
            @else
            <td><a href="" class="btn btn-sm btn-success">{{$t['status']}}</a></td>
            @endif
        </tr>
        @endforeach


    </table>
</div>