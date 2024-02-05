<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'nama_lengkap' => 'Administrator',
            'username' => 'admin',
            'user_type' => 'admin',
            'password' => bcrypt('123'),
            'email' => 'admin@perpus.web',
        ]);
        User::create([
            'nama_lengkap' => 'Petugas',
            'username' => 'petugas',
            'user_type' => 'petugas',
            'password' => bcrypt('1234'),
            'email' => 'admin1@perpus.web',
        ]);
        User::create([
            'nama_lengkap' => 'peminjam',
            'username' => 'peminjam',
            'user_type' => 'peminjam',
            'password' => bcrypt('12345'),
            'email' => 'admin2@perpus.web',
        ]);
    }
}
