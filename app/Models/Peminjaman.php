<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;
    
    public $table = 'peminjaman';


    public $fillable = [
        'buku_id',
        'user_id',
        'nama_peminjam',
        'tgl_pinjam',
        'tgl_pengembalian',
        'rating',
        'ulasan',
        'status_peminjam',
        'batas_tgl_pengembalian',
    ];
}
