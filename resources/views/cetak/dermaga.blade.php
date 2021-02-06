<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Kapal</title>
</head>

<body>

    <h1 align="center">Laporan Kapal</h1>
    {{-- informasi jadwal --}}
    <table cellspacing='0' cellpadding='10' border="1" style="width: 100%">
        <thead>
            <tr>
                <th>No.</th>
                <th>ID Dermaga</th>
                <th>Nama</th>
                <th>Kapal Masuk</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dermaga as $d)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$d->id}}</td>
                <td>{{$d->nama}}</td>
                <td>{{count($d->jadwal)}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <br>
</body>

</html>