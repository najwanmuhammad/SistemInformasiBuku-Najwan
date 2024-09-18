<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pertemuan 5 dan 6</title>
</head>
<body>
    <a href="{{ route('buku.create') }}" class="btn btn-primary float-end">Tambah Buku</a>
    <table border="1" class = "table table_stripped">
        <thead>
            <tr>
                <th>No.</th>
                <th>Judul Buku</th>
                <th>Penulis</th>
                <th>Harga</th>
                <th>Tahun Terbit</th>
                <th>Aksi</th>
                <th>Edit</th>
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

                <td>
                    <form action="{{ route('buku.destroy', $Buku -> id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Yakin mau dihapus?')" type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>

                <td>
                    @csrf
                    <a href="{{ route('buku.edit', $Buku->id) }}" class="btn btn-warning">Edit</a>
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>

    <p>Total Buku: {{ $total_buku }}</p>

    <p>Total Harga Semua Buku: Rp. {{ number_format($total_harga, 2, ',', '.') }}</p>

</body>
</html>
