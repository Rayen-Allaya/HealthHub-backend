<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Availibility>
 */
class AvailibilityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $doctor = \App\Models\User::where('role', 'doctor')->inRandomOrder()->first();
        return [
            'doctor_id' => $doctor->id,
            'datetime' => fake()->dateTimeInInterval($startDate = '-14 days', $interval = '+ 60 days', $timezone = null),
        ];
    }
}
