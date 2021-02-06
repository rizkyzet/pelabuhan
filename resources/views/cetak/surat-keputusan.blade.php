<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Keputusan</title>
</head>

<body>

    <h1 align="center">Surat Keputusan</h1>
    {{-- informasi jadwal --}}
    <table cellspacing='0' cellpadding='10' border="1" style="width: 100%">
        <thead>
            <tr>
                <th colspan="4">Informasi Jadwal</th>
            </tr>
            <tr>
                <th>
                    Waktu Mulai
                </th>
                <th>
                    Waktu Selesai
                </th>
                <th>
                    Kapal
                </th>
                <th>
                    Dermaga
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    {{$jadwal->waktu_mulai}}
                </td>

                <td>
                    {{$jadwal->waktu_selesai}}
                </td>

                <td>
                    {{$jadwal->kapal->jenis}}
                </td>

                <td>
                    {{$jadwal->dermaga->nama}}
                </td>
            </tr>
        </tbody>
    </table>
    <br>
    <hr>
    {{-- Informasi Pembayaran --}}
    <div style="width: 49%; float:left;">
        <table cellspacing="0" cellpadding="10" border="1" style="width: 100%;">
            <thead>
                <tr>
                    <th colspan="2">Informasi Pembayaran</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Order ID</th>
                    <td>{{$jadwal->order_id}}</td>
                </tr>
                <tr>
                    <th>Bank</th>
                    <td>{{strtoupper($jadwal->bank)}}</td>
                </tr>
                <tr>
                    <th>VA Number</th>
                    <td>{{$jadwal->va_number}}</td>
                </tr>
                <tr>
                    <th>Jumlah Muatan</th>
                    <td>{{$jadwal->jumlah_muatan}}</td>
                </tr>

                <tr>
                    <th>Total Bayar</th>
                    <td>{{rupiah($jadwal->harga)}}</td>
                </tr>

            </tbody>
        </table>
    </div>

    {{-- Informasi Agen --}}
    <div style="width:50%;float:right;">
        <table cellspacing="0" cellpadding="10" border="1" style="width: 100%;margin:auto auto;">
            <thead>
                <tr>
                    <th colspan="2">Informasi Agen</th>
                </tr>
            </thead>
            <tbody>
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
                    <th>No HP</th>
                    <td>{{$jadwal->user->no_hp}}</td>
                </tr>

            </tbody>
        </table>
    </div>
</body>

</html>