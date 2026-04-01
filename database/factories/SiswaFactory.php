<?php

namespace Database\Factories;

use App\Models\Siswa;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Siswa>
 */
class SiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nis' => $this->faker->unique()->numerify('##########'),
            'nama' => $this->faker->name(),
            'kelas' => $this->faker->randomElement([
                'X PPLG 1',
                'X PPLG 2',
                'X PPLG 3',
            ])
        ];
    }
}
