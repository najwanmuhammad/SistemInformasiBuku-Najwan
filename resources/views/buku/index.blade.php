<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pertemuan 5</title>
</head>
<body>
    <table border="1" class = "table table_stripped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Judul Buku</th>
                <th>Penulis</th>
                <th>Harga</th>
                <th>Tahun Terbit</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data_buku as $Buku)
            <tr>
                <td>{{$Buku->id}}</td>
                <td>{{$Buku->judul}}</td>
                <td>{{$Buku->penulis}}</td>
                <td>Rp. {{number_format($Buku->harga,2,',','.')}}</td>
                <td>{{ $Buku->tanggal_terbit instanceof \DateTime ? $Buku->tanggal_terbit->format('d/m/y') : $Buku->tanggal_terbit }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <p>Total Buku: {{ $total_buku }}</p>

    <p>Total Harga Semua Buku: Rp. {{ number_format($total_harga, 2, ',', '.') }}</p>

</body>
</html>
