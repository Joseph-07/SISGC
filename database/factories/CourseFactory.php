<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code' => fake()->sentence(),
            'descripcion' => fake()->text(1000),
            'id_personal' => 1,
            'id_system' => 1,
            'id_clas' => 1,
            'id_spec' => 1,
            'id_proc' => 1
        ];
    }
}
