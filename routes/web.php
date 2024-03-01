<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriBukuController;
use App\Http\Controllers\KoleksiController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\RegisterAdminController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UlasanController;
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



// Route::view('tabelAdmin', 'login.tabel-register')->name('login.tabel-register');
// Route::view('registerAdmin', 'login.registerAdmin')->name('login.registerAdmin');
// Route::view('peminjam', 'layouts.tabel-pinjam');
// Route::view('form-pinjam', 'layouts.form-pinjam');

Route::group(['namespace' => 'App\Http\Controllers'], function () {
    Route::get('/login', 'LoginController@formLogin')->name('login.login');
    Route::post('/login', 'LoginController@login');
    Route::post('/logout', 'LoginController@logout')->name('logout');

    Route::get('/admin', 'DashboardController@index')->name('admin');

    Route::get('/tabel1', 'BukuController@index')->name('layouts.tabel-data');
    Route::get('buku/edit', 'BukuController@edit')->name('buku.edit');
    Route::post('buku/update/{id}', 'BukuController@update')->name('buku.update');
    Route::delete('buku/delete/{id}', 'BukuController@delete')->name('buku.delete');
    Route::get('/form', [BukuController::class, 'create'])->name('layouts.form-data');
    Route::post('/form', [BukuController::class, 'store']);

    Route::get('/tambah-pinjam', [PeminjamanController::class, 'create'])->name('peminjaman.create');
    Route::post('/tambah-pinjam', [PeminjamanController::class, 'store'])->name('peminjaman.store');
    Route::get('/peminjam', 'PeminjamanController@index')->name('layouts.tabel-pinjam');
    Route::post('/pengembalian/saveData', 'PeminjamanController@saveData')->name('pengembalian.saveData');


    Route::get('/register', [RegisterController::class, 'index'])->name('register.form');
    Route::post('/register', [RegisterController::class, 'register'])->name('register');

    Route::get('/register-admin', [RegisterAdminController::class, 'index'])->name('login.tabel-register');
    Route::get('/admin-register-create', [RegisterAdminController::class, 'create'])->name('registerAdmin.create');
    Route::post('/admin-register-store', [RegisterAdminController::class, 'store'])->name('registerAdmin.store');
    Route::get('register/edit', 'BukuController@edit')->name('register.edit');

    Route::get('/ulasan', [UlasanController::class, 'index'])->name('layouts.tabel-ulasan');

    Route::get('/kategori-tabel', 'KategoriBukuController@index')->name('layouts.kategori-buku');
    Route::post('kategori/update/{id}', 'KategoriBukuController@update')->name('kategori.update');
    Route::delete('kategori/delete/{id}', 'KategoriBukuController@delete')->name('kategori.delete');
    Route::post('/formKategori', [KategoriBukuController::class, 'store']);

    Route::get('/tabel-koleksi', 'KoleksiController@index')->name('layouts.tabel-koleksi');
    Route::post('/form-koleksi', [KoleksiController::class, 'store'])->name('koleksi.store');
    Route::post('koleksi/delete', 'KoleksiController@destroy')->name('koleksi.destroy');

    Route::get('/laporan_perpustakaan/pdf', 'LaporanController@generatePDF')->name('layouts.laporan-perpustakaan');
    Route::get('/laporan_perpustakaan', 'LaporanController@index')->name('layouts.laporan_perpustakaan');
    // Route::post('koleksi/delete', 'KoleksiController@destroy')->name('koleksi.destroy');
});
