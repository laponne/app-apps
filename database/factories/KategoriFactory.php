<?php

namespace Database\Factories;

use App\Models\Kategori;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Kategori>
 */
class KategoriFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $kategoriBangunan = [
            'Ruang Kelas',
            'Laboratorium',
            'Perpustakaan',
            'Toilet',
            'Lapangan',
        ];

        return [
            'nama_kategori' => $this->faker->randomElement($kategoriBangunan),
        ];
    }
}
