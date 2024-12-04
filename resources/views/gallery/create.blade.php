<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Buku</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</head>
<body>

    <div class="container mt-5">

        @if (count($errors)>0)
            <div class="alert alert-danger">
                <ul style="list-style: none">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3 row">
                <label for="title" class="col-md-4 col-form-label text-md-end text-start">Title</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" id="title" name="title">
                    @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label for="description" class="col-md-4 col-form-label text-md-end text-start">Description</label>
                <div class="col-md-6">
                    <textarea class="form-control" id="description" rows="5" name="description"></textarea>
                    @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label for="input-file" class="col-md-4 col-form-label text-md-end text-start">File input</label>
                <div class="col-md-6">
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="input-file" name="picture">
                            <label class="custom-file-label" for="input-file">Choose file</label>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>
