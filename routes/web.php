<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/buku/index', [BooksController::class, 'index']) -> name('buku.index');

Route::get('/buku/create', [BooksController::class, 'create']) -> name('buku.create');

Route::post('/buku', [BooksController::class, 'store']) -> name('buku.store');

Route::delete('/buku/{id}', [BooksController::class, 'destroy']) -> name('buku.destroy');

Route::get('/buku/{id}/edit', [BooksController::class, 'edit'])->name('buku.edit');
Route::put('/buku/{id}', [BooksController::class, 'update'])->name('buku.update');
