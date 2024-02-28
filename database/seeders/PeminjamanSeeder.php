<?php

namespace Database\Seeders;

use App\Models\Buku;
use App\Models\KategoriBuku;
use App\Models\KategoriBukuRelasi;
use App\Models\Peminjaman;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PeminjamanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::factory()->count(4)->create();
        $buku = Buku::factory()->count(15)->create();
      $kategori_list = ['Fiksi', 'Non Fiksi'];
        
        foreach ($kategori_list as $kat) {
          KategoriBuku::create([
            'nama_kategori' => $kat
          ]);
        }
        foreach ( $buku as $buk) {
          KategoriBukuRelasi::create([
            'kategori_id' => rand(1,2),
            'buku_id' => $buk->id
          ]);
        }
        Peminjaman::factory()->count(25)->recycle([$user, $buku])->create();
    }
  }