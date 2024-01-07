<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ExternalPatient>
 */
class ExternalPatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $doctor= \App\Models\User::where('role', 'doctor')->inRandomOrder()->first();
        return [
            'doctor_id' => $doctor->id,
            'firstName' => fake()->firstName(),
            'lastName' => fake()->lastName(),
            'phone_num' => fake()->numberBetween($min = 10000000, $max =999999999 ),
            'email' => fake()->email(),
            'birthday' => fake()->dateTime(),




        ];
    }
}
