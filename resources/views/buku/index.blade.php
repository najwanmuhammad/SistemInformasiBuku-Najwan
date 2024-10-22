<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pertemuan 9</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <form action="{{ route('buku.search') }}" method="GET" style="margin-top: 20px; margin-left: 20px;">
        @csrf
    <input type="text" name="kata" class="form-control" placeholder="Mau cari buku apa..."
    style="width: 30%; margin-bottom: 10px; border: 2px solid #007bff; box-shadow: 0 0 10px rgba(0, 123, 255, 0.5);">

    <table class="table mt-3">
        @if (Session::has('menambah'))
            <div class="alert alert-success" id="success-alert" style="background-color: rgb(57, 182, 57); color: white;">
                {{ Session::get('menambah') }}
            </div>
        @endif

        @if (Session::has('memperbarui'))
            <div class="alert alert-success" id="success-alert" style="background-color: rgb(45, 101, 255); color: white;">
                {{ Session::get('memperbarui') }}
            </div>
        @endif

        @if (Session::has('menghapus'))
            <div class="alert alert-success" id="success-alert" style="background-color: rgb(255, 98, 98); color: white;">
                {{ Session::get('menghapus') }}
            </div>
        @endif

        <script>
            setTimeout(function() {
                document.getElementById('success-alert').style.display = 'none';
            }, 3000);
        </script>
    </form>

    <div class="d-flex justify-content-center mt-3 mb-3">
        <a href="{{ route('buku.create') }}" class="btn btn-primary" >Tambah Buku</a>
    </div>

        <thead class="table-light">
            <tr>
                <th>No</th>
                <th>Judul Buku</th>
                <th>Penulis</th>
                <th>Harga</th>
                <th>Tanggal Terbit</th>
                <th  class="text-center">Edit</th>
                <th  class="text-center">Hapus</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data_buku as $index => $Buku)
            <tr>
                <td>{{ ++$no }}</td>
                <td>{{$Buku->judul}}</td>
                <td>{{$Buku->penulis}}</td>
                <td>Rp {{number_format($Buku->harga, 2,',','.')}}</td>
                <td>{{ \Carbon\Carbon::parse($Buku->tanggal_terbit)->format('d/m/Y') }}</td>
                <td class="text-center">
                    <a href="{{ route('buku.edit', $Buku->id) }}" class="btn btn-primary">Edit</a>
                </td>
                <td class="text-center">
                    <form action = "{{ route('buku.destroy', $Buku->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button onclick="return confirm('Yakin mau dihapus')" type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            @endforeach
        </tbody>
    </table>


    <div style="margin-right: 20px">{{ $data_buku ->links('pagination::bootstrap-5') }}</div>


    <div class="container mt-8">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0"><i class="fas fa-book"></i> Informasi Buku</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 text-center">
                        <i class="fas fa-book-open fa-3x text-info mb-3"></i>
                        <p class="card-text h5">Total Buku:</p>
                        <p class="display-4 font-weight-bold text-primary">{{ $jumlah_buku }}</p>
                    </div>
                    <div class="col-md-6 text-center">
                        <i class="fas fa-dollar-sign fa-3x text-success mb-3"></i>
                        <p class="card-text h5">Total Harga Semua Buku:</p>
                        <p class="display-4 font-weight-bold text-success">Rp {{ number_format($total_harga, 2, ',', '.') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
