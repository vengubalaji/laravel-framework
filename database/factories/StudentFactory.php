<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
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
            'roll_no' => $this->faker->text($maxNbChars = 8),
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'gender' => $gender,
            'year' => $this->faker->text($maxNbChars = 5),
            'department_id' => $this->faker->numberBetween($min = 101, $max = 110),
            'email_verified_at' => now(),
            'address' => $this->faker->text(),
            'visitor' => $this->faker->ipv4(),
        ];

        // return $this->state('name-test', function (array $attributes) {
        //     return [
        //         'name' => 'Krishna',
        //     ];
        // });
    }

    public function anonymous()
    {
        return $this->state([
            'roll_no' => 'A000050'
        ]);
    }
}
