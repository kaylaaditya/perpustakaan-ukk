<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriBukuRelasi extends Model
{
    use HasFactory;

    public $table = 'kategori_buku_relasi';

    public $fillable = [
        'buku_id',
        'kategori_id',
    ];
}
