<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Buku</title>
</head>
<body>
    <div class="container">
        <h4>Tambah Buku</h4>
        <form method="POST" action="{{route('buku.store')}}">
            @csrf
            <div>Judul <input type="text" name="judul"></div>
            <div>Penulis <input type="text" name="penulis"></div>
            <div>Harga <input type="text" name="harga"></div>
            <div>Tanggal Terbit <input type="date" name="tanggal_terbit"></div>
            <button type="submit">Simpan</button>
            <a href="{{'/buku/index'}}">Kembali</a>
        </form>
    </div>
</body>
</html>
