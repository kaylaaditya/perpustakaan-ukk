<?php

namespace Database\Factories;

use App\Models\Buku;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Peminjaman>
 */
class PeminjamanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'buku_id' => Buku::factory(),
            'nama_peminjam' => $this->faker->name(),
            'tgl_pinjam' => $this->faker->date(),
            'tgl_pengembalian' => $this->faker->date(),
            'rating' => $this->faker->name(),
            'ulasan' => $this->faker->name(),
            'status_peminjam' => $this->faker->name(),
            
        ];
    }
}
