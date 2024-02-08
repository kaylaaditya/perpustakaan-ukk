<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\PeminjamanController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// ROUTE WELCOME
Route::view('/', 'welcome');



Route::view('register', 'login.register');
// Route::view('laporan', 'layouts.laporan');
// Route::view('peminjam', 'layouts.tabel-pinjam');
// Route::view('form-pinjam', 'layouts.form-pinjam');

Route::group(['namespace' => 'App\Http\Controllers'], function () {
    Route::get('/login', 'LoginController@formLogin')->name('login.login');
    Route::post('/login', 'LoginController@login');
    Route::post('/logout', 'LoginController@logout')->name('logout');

    Route::get('/admin', 'DashboardController@index')->name('admin');
    Route::get('/tabel1', 'BukuController@index')->name('layouts.tabel-data');
    // Route::resource('buku', BukuController::class);
    Route::get('buku/edit', 'BukuController@edit')->name('buku.edit');
    Route::get('buku/update', 'BukuController@update')->name('buku.update');


    Route::get('/form', [BukuController::class, 'create'])->name('layouts.form-data');
    Route::post('/form', [BukuController::class, 'store']);

    Route::get('/tambah-pinjam', [PeminjamanController::class, 'create'])->name('peminjaman.create');
    Route::post('/tambah-pinjam', [PeminjamanController::class, 'store'])->name('peminjaman.store');

    Route::get('/peminjam', 'PeminjamanController@index')->name('layouts.tabel-pinjam');
    Route::post('/pengembalian/saveData', 'PeminjamanController@saveData')->name('pengembalian.saveData');

    Route::get('/laporan_perpustakaan', 'BukuController@indexLaporan')->name('layouts.laporan_perpustakaan');
});
