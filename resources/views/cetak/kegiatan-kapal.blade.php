<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Kegiatan Kapal</title>
</head>

<body>

    <h1 align="center">Laporan Kegiatan Kapal</h1>
    {{-- informasi jadwal --}}
    <table cellspacing='0' cellpadding='10' border="1" style="width: 100%">
        <thead>
            <tr>
                <th>No.</th>
                <th>Order ID</th>
                <th>Nama Agen</th>
                <th>Dermaga</th>
                <th>Kapal</th>
                <th>Waktu Mulai</th>
                <th>Waktu Selesai</th>
                <th>Biaya</th>
            </tr>
        </thead>
        <tbody>


            @forelse ($jadwal as $j)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$j->order_id}}</td>
                <td>{{$j->user->name}}</td>
                <td>{{$j->dermaga->nama}}</td>
                <td>{{$j->kapal->jenis}}</td>
                <td>{{$j->waktu_mulai}}</td>
                <td>{{$j->waktu_selesai}}</td>
                <td>{{$j->harga}}</td>
            </tr>
            @empty
            <tr>
                <td colspan="8" align="center">
                    <p>Data Kosong</p>
                </td>
            </tr>
            @endforelse
            <tr>
                <td colspan="8" align="right"><strong>Total : </strong>{{$jadwal->sum('harga')}}</td>
            </tr>
        </tbody>
    </table>
    <br>
</body>

</html>