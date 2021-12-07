<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProfessorProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $gender = $this->faker->randomElement(['M', 'F']);

        return [
            'gender' => $gender,
            'department_id' => $this->faker->numberBetween($min = 101, $max = 110),
            'experience' => $this->faker->randomDigitNotNull(),
            'address' => $this->faker->text()
        ];
    }
}
