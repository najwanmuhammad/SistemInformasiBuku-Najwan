@extends('auth.layouts')

@section('content')
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            @if (Session::has('menambah'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('menambah') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            @if (Session::has('memperbarui'))
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    {{ Session::get('memperbarui') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (Session::has('menghapus'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ Session::get('menghapus') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="card">
                <div class="card-header">Dashboard
                    <span>
                        <a href="{{ route('gallery.create') }}" class="btn btn-primary" style="float: right;">Tambah Gallery</a>
                    </span>
                </div>
                <div class="card-body">
                    <div class="row">
                        @if(count($galleries)>0)
                        @foreach ($galleries as $gallery)
                        <div class="col-sm-2">
                            <div>
                                <a class="example-image-link" href="{{asset('storage/posts_image/'.$gallery->picture )}}" data-lightbox="roadtrip" data-title="{{$gallery->description}}">
                                    <img class="example-image img-fluid mb-2" src="{{asset('storage/posts_image/'.$gallery->picture )}}" alt="image-1" />
                                </a>
                                <a href="{{ route('gallery.show', $gallery->id) }}" class="btn btn-secondary btn-sm mt-2" style="width: 100px;">Show</a>
                                <a href="{{ route('gallery.edit', $gallery->id) }}" class="btn btn-info btn-sm mt-2" style="width: 100px;">Edit</a>
                                <form action="{{ route('gallery.destroy', $gallery->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm mt-2" style="width: 100px;">Delete</button>
                                </form>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <h3>Tidak ada data.</h3>
                        @endif
                        <div class="d-flex">
                            {{ $galleries->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
