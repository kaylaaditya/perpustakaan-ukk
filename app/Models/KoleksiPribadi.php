<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KoleksiPribadi extends Model
{
    use HasFactory;

    public $table = 'koleksi_pribadi';

    public $fillable = [
        'user_id',
        'buku_id',
    ];
}
