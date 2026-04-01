<?php

namespace Database\Factories;

use App\Models\Aspirasi;
use App\Models\LaporanPengaduan;
use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends Factory<Aspirasi>
 */
class AspirasiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'laporan_id' => 1,  // Will be overridden in seeder
            'admin_id' => 1,  // Will be overridden in seeder
            'status' => $this->faker->randomElement([
                'menunggu',
                'proses',
                'selesai'
            ]),
            'feedback' => $this->faker->optional()->numberBetween(1, 5) 
        ];
    }
}
