<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Appointment>
 */
class AppointmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user_id = User::select('id')->inRandomOrder()->first()->id;
        $doctor_id = User::select('id')->inRandomOrder()->first()->id;
        return [
            'description' => fake()->paragraph(),
            'user_id' => $user_id,
            'doctor_id' => $doctor_id,
        ];
    }
}
