<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DoctorProfile>
 */
class DoctorProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $doctor= \App\Models\User::where('role', 'doctor')->inRandomOrder()->first();
        $governorate= ['Ariana', 'Beja', 'Ben Arous', 'Bizerte', 'Gabes', 'Gafsa', 'Jendouba', 'Kairouan', 'Kasserine', 'Kebili', 'Kef', 'Mahdia', 'Manouba', 'Medenine', 'Monastir', 'Nabeul', 'Sfax', 'Sidi Bouzid', 'Siliana', 'Sousse', 'Tataouine', 'Tozeur', 'Tunis', 'Zaghouan']; 
        return [
            'doctor_id' => $doctor->id,
            'cost' => fake()->numberBetween($min = 50, $max = 200),
            'governorate' => fake()->randomElement($governorate),
            'latitude' => fake()->latitude(),
            'longitude' => fake()->longitude(),
            'description' => fake()->text($maxNbChars = 200),
        ];
    }
}
