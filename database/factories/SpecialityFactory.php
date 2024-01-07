<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Speciality;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Speciality>
 */
class SpecialityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $doctorSpecialities = ['Cardiology', 'Orthopedics', 'Pediatrics', 'Dermatology', 'Ophthalmology', 'Neurology', 'Gynecology', 'Urology'];
        return [
           'speciality' => fake()->randomElement($doctorSpecialities),
        ];
    }
}
