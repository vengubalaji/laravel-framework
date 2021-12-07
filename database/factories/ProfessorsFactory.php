<?php

namespace Database\Factories;

use App\Models\ProfessorProfile;
use App\Models\Professors;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfessorsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->phoneNumber(),
            'staff_id' => $this->faker->text($maxNbChars = 8)
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Professors $professor) {
            $professor->professorprofile()->save(ProfessorProfile::factory()->make());
        });

        // return $this->afterMaking(function (Professors $professor) {
        //     $professor->professorprofile()->save(ProfessorProfile::factory()->make());
        // });

    }

}
