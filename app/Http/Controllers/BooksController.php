<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $batas = 5;
        $data_buku = Book::orderBy('id', 'desc') -> paginate($batas);
        $no = $batas * ($data_buku -> currentPage() - 1);
        $jumlah_buku = Book::count();
        $total_harga = Book::sum('harga');

        return view ('buku.index', compact('batas', 'no', 'data_buku', 'jumlah_buku', 'total_harga'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('buku.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate ($request,[
            'judul'             => 'required|string',
            'penulis'           => 'required|string|max:30',
            'harga'             => 'required|numeric',
            'tanggal_terbit'    => 'required|date',
        ],

        [
            'judul.required'          => 'Kamu harus mengisi judul terlebih dahulu',
            'judul.string'            => 'judul harus diisi data bertipe string',
            'penulis.required'        => 'Kamu harus mengisi penulis terlebih dahulu',
            'penulis.string'          => 'Penulis harus diisi data bertipe string',
            'penulis.max'             => 'Penulis maksimal 30 karakter',
            'harga.required'          => 'Kamu harus mengisi harga terlebih dahulu',
            'harga.numeric'           => 'Harga harus diisi data bertipe nomor',
            'tanggal_terbit.required' => 'Kamu harus mengisi tanggal terbit terlebih dahulu',
            'tanggal_terbit.date'     => 'Tanggal terbit harus diisi data bertipe tanggal'
        ]);

        $buku = new Book();
        $buku->judul = $request->judul;
        $buku->penulis = $request->penulis;
        $buku->harga = $request->harga;
        $buku->tanggal_terbit = $request->tanggal_terbit;
        $buku->save();

        return redirect('/buku/index/') -> with('menambah', 'Data buku berhasil disimpan');
    }

    public function search (Request $request)
    {
        $batas = 5;

        $cari = $request->kata;

        $data_buku = Book::where('judul','like',"%".$cari."%")->paginate($batas);

        $no = $batas * ($data_buku->currentPage() - 1);

        $count = $data_buku->count();

        return view('buku.search', compact('no', 'data_buku', 'count', 'cari'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $buku = Book::find($id);

        return view('buku.edit', compact('buku'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate ($request,[
            'judul'             => 'required|string',
            'penulis'           => 'required|string|max:30',
            'harga'             => 'required|numeric',
            'tanggal_terbit'    => 'required|date'
        ]);


        $buku = Book::find($id);
        $buku->judul = $request-> input ('judul');
        $buku->penulis = $request-> input ('penulis');
        $buku->harga = $request-> input ('harga');
        $buku->tanggal_terbit = $request-> input ('tanggal_terbit');
        $buku->save();

        return redirect('/buku/index') -> with('memperbarui', 'Data buku berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $buku = Book::find($id);
        $buku -> delete();

        return redirect ('/buku/index/') -> with('menghapus', 'Data buku berhasil dihapus');
    }
}
