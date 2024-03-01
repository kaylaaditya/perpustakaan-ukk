<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    public function index()
    {
        return view('layouts.laporan');

    }

    public function generatePDF()
    {
        // Data contoh untuk laporan
        $data_peminjaman = Peminjaman::selectRaw('peminjaman.id, users.nama_lengkap as nama_peminjam, buku.judul, tgl_pinjam, tgl_pengembalian, status_peminjam')
        ->join('buku', 'buku.id', '=', 'buku_id')
        ->join('users', 'users.id', '=', 'user_id')->get(); 
        $data = [
            'data_peminjaman' => $data_peminjaman,
        ];

        // Tampilkan laporan PDF
        $pdf = PDF::loadView('layouts.pdf', $data);
        return $pdf->download('laporan_perpusweb.pdf');
    }

    public function apiLaporan()
    {
        $dataPerpustakaan = Peminjaman::selectRaw('peminjaman.id, users.nama_lengkap as nama_peminjam, buku.judul, tgl_pinjam, tgl_pengembalian, status_peminjam')
            ->join('buku', 'buku.id', '=', 'buku_id')
            ->join('users', 'users.id', '=', 'user_id');
        return datatables()->of($dataPerpustakaan)->toJson();
    }

    // public function indexLaporan()
    // {
    //     return view('layouts.laporan_perpustakaan');
    // }


}
