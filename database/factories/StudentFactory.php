<?php

namespace Database\Factories;

use App\Models\Clas;
use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;


class StudentFactory extends Factory
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
            'clas_id' => Clas::inRandomOrder()->first()->id,
            'course_id' => Course::inRandomOrder()->first()->id,
        ];
    }
}
