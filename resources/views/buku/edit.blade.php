<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Buku</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Update Buku</h2>
        @if (count($errors)>0)
            <div class="alert alert-danger">
                <ul style="list-style: none">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            </div>
        @endif

        <form action="{{ route('buku.update', $buku->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="judul" class="form-label">Judul Buku:</label>
                <input type="text" class="form-control" id="judul" name="judul" value="{{ $buku->judul }}" required>
            </div>

            <div class="mb-3">
                <label for="penulis" class="form-label">Penulis:</label>
                <input type="text" class="form-control" id="penulis" name="penulis" value="{{ $buku->penulis }}" required>
            </div>

            <div class="mb-3">
                <label for="harga" class="form-label">Harga:</label>
                <input type="text" class="form-control" id="harga" name="harga" value="{{ $buku->harga }}" required>
            </div>

            <div class="mb-3">
                <label for="tanggal_terbit" class="form-label">Tahun Terbit:</label>
                <input type="date" class="form-control" id="tanggal_terbit" name="tanggal_terbit" value="{{ $buku->tanggal_terbit instanceof \DateTime ? $buku->tanggal_terbit->format('d/m/Y') : $buku->tanggal_terbit }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('buku.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>
