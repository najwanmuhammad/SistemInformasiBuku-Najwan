<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku</title>
</head>
<body>
    <h1>Edit Buku</h1>
    <form action="{{ route('buku.update', $buku->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="judul">Judul Buku:</label>
        <input type="text" name="judul" value="{{ $buku->judul }}" required>

        <label for="penulis">Penulis:</label>
        <input type="text" name="penulis" value="{{ $buku->penulis }}" required>

        <label for="harga">Harga:</label>
        <input type="number" name="harga" value="{{ $buku->harga }}" required>

        <label for="tanggal_terbit">Tanggal Terbit:</label>
        <input type="date" name="tanggal_terbit" value="{{ $buku->tanggal_terbit instanceof \DateTime ? $buku->tanggal_terbit->format('d/m/y') : $buku->tanggal_terbit }}" required>

        <button type="submit">Update</button>
        <a href="{{ route('buku.index') }}">Kembali</a>

    </form>
</body>
</html>
