<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;

use App\Http\Controllers\Auth\LoginRegisterController;

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


Route::controller(LoginRegisterController::class)->group(function () {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::post('/logout', 'logout')->name('logout');
});

Route::get('/buku/index', [BooksController::class, 'index']) -> name('buku.index');

Route::get('/buku/create', [BooksController::class, 'create']) -> name('buku.create');
Route::post('/buku', [BooksController::class, 'store']) -> name('buku.store');

Route::delete('/buku/{id}', [BooksController::class, 'destroy']) -> name('buku.destroy');

Route::get('/buku/edit/{id}', [BooksController::class, 'edit']) -> name('buku.edit');
Route::put('/buku/{id}', [BooksController::class, 'update']) -> name('buku.update');

Route::get('/buku/search', [BooksController::class, 'search']) -> name('buku.search');
