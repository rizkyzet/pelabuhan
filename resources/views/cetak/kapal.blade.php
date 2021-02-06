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
                <th>ID Kapal</th>
                <th>Jenis</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kapal as $k)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$k->id}}</td>
                <td>{{$k->jenis}}</td>
            </tr>
            @endforeach
            <tr>
                <td colspan="3" align="right"><strong>Total Kapal: </strong>{{count($kapal)}}</td>
            </tr>
        </tbody>
    </table>
    <br>
</body>

</html>