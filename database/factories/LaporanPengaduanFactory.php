<?php

namespace Database\Factories;

use App\Models\LaporanPengaduan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<LaporanPengaduan>
 */
class LaporanPengaduanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'siswa_id' => 1,  // Will be overridden in seeder
            'kategori_id' => 1,  // Will be overridden in seeder
            'ket' => $this->faker->sentence(12),
            'lokasi' => $this->faker->randomElement([
                'Ruang Kelas',
                'Laboratorium',
                'Perpustakaan',
                'Toilet',
                'Lapangan',
            ])
        ];
    }
}
