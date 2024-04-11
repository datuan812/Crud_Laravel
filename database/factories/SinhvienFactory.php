<?php

namespace Database\Factories;

use App\Models\Khoahoc;
use App\Models\Lophoc;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\sinhvien>
 */
class SinhvienFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'name' => fake()->name(),
            'email' => fake()->email(),
            'phone' => fake()->phoneNumber(),
            'address' => fake()->address(),
            'lophoc_id' => Lophoc::inRandomOrder()->first()->id,
            'khoahoc_id' => Khoahoc::inRandomOrder()->first()->id,
        ];
    }
}
