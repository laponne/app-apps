<?php

namespace Database\Factories;

use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Admin>
 */
class AdminFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nama' => $this->faker->name(),
            'username' => $this->faker->unique()->userName(),
            'password' => Hash::make('password'),
        ];
    }
}
