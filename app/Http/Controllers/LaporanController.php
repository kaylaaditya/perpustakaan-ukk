<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    public function index()
    {
        return view('layouts.pdf');

    }

    public function generatePDF()
    {
        // Data contoh untuk laporan
        $dataPerpustakaan = Peminjaman::selectRaw('peminjaman.id, users.nama_lengkap as nama_peminjam, buku.judul, tgl_pinjam, tgl_pengembalian, status_peminjam')
        ->join('buku', 'buku.id', '=', 'buku_id')
        ->join('users', 'users.id', '=', 'user_id'); 
        $data = [
            'laporan_perpustakaan' => $dataPerpustakaan,
        ];

        // Tampilkan laporan PDF
        $pdf = PDF::loadView('laporan', $data);
        return $pdf->download('laporan_perpusweb.pdf');
    }
}
