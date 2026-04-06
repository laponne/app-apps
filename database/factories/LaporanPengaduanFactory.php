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
        $keluhan = [
            'Lampu di ruang kelas tidak menyala',
            'Kursi dan meja rusak perlu diganti',
            'Pintu ruang kelas tidak bisa dikunci',
            'Ventilasi udara kurang baik',
            'Papan tulis sudah tidak rata',
            'Kabel listrik terputus dan berbahaya',
            'AC tidak berfungsi dengan optimal',
            'Keran air bocor terus-menerus',
            'Lantai retak dan licin',
            'Jendela pecah dan perlu diganti',
            'Atap bocor saat hujan',
            'Meja laboratorium tidak stabil',
            'Lemari penyimpanan barang hilang',
            'Pintu toilet tidak bisa ditutup',
            'Saluran air tersumbat',
        ];

        $lokasi = [
            'Ruang Kelas',
            'Laboratorium',
            'Perpustakaan',
            'Toilet',
            'Lapangan',
        ];

        return [
            'siswa_id' => 1,  // Will be overridden in seeder
            'kategori_id' => 1,  // Will be overridden in seeder
            'ket' => $this->faker->randomElement($keluhan),
            'lokasi' => $this->faker->randomElement($lokasi)
        ];
    }
}
