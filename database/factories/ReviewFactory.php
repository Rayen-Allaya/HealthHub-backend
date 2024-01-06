<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Review;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user= \App\Models\User::where('role', 'user')->inRandomOrder()->first();
        $doctor= \App\Models\User::where('role', 'doctor')->inRandomOrder()->first();
        return [
            'user_id' => $user->id,
            'doctor_id' => $doctor->id,
            'datetime' => fake()->dateTime(),
            'rating' => $this->faker->numberBetween(1, 5),
            'review' => $this->faker->sentence(20),
        ];
    }
}
