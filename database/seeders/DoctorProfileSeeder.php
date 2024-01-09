<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DoctorProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $governorate = ['Djerba', 'Ariana', 'Beja', 'Ben Arous', 'Bizerte', 'Gabes', 'Gafsa', 'Jendouba', 'Kairouan', 'Kasserine', 'Kebili', 'Kef', 'Mahdia', 'Manouba', 'Medenine', 'Monastir', 'Nabeul', 'Sfax', 'Sidi Bouzid', 'Siliana', 'Sousse', 'Tataouine', 'Tozeur', 'Tunis', 'Zaghouan'];
        $specilaity = ['Cardiologist', 'Dentist', 'Ophthalmologists', "Dermatologist"];

        $longitude = [
            10.1797, 10.1392, 10.0911, 10.2566, 10.7541, 10.6096,
            10.1700, 10.1280, 10.2300, 10.1800, 10.1200, 10.2600,
            10.1800, 10.2400, 10.5100, 10.1200, 10.3200, 10.4600,
            10.3200, 10.5900, 10.7500, 10.0800, 10.3100, 10.2700,
            10.6000, 10.9000, 10.3300, 10.2300, 10.7600, 10.3200,
            10.6400, 10.3300, 10.5700, 10.9500, 10.8100, 10.4200,
            10.7200, 10.4900, 10.8900, 10.6500, 10.3200
        ];
        $latitude = [
            36.8065, 36.8611, 36.8082, 36.7528, 34.7406, 35.8252,
            36.8500, 36.8600, 36.8600, 36.7400, 34.7400, 36.7800,
            36.4700, 35.8200, 36.5200, 36.8600, 35.2400, 36.4200,
            36.6800, 36.5200, 36.9000, 36.7500, 36.5200, 35.8200,
            35.8700, 36.0500, 36.7500, 36.6700, 36.0500, 36.8200,
            36.5700, 36.7500, 36.5300, 35.9500, 36.7000, 35.8300,
            36.6700, 36.4300, 35.8300, 36.7200, 36.6200
        ];
        $cities = [
            "Tunis", "Ariana", "Manouba", "Tunis", "Ben Arous", "Sousse",
            "Ariana", "Ariana", "Ariana", "Manouba", "Tunis", "Ben Arous",
            "Manouba", "Sfax", "Ariana", "Tunis", "Sfax", "Manouba",
            "Tunis", "Ariana", "Sousse", "Tunis", "Manouba", "Ariana",
            "Ben Arous", "Tunis", "Sousse", "Manouba", "Ben Arous", "Tunis",
            "Sfax", "Manouba", "Ariana", "Sousse", "Ben Arous", "Tunis",
            "Ariana", "Manouba", "Sousse", "Ariana", "Manouba"
        ];
        for ($i = 0; $i < 40; $i++) {
            $doctor_database = \App\Models\User::where("id", $i + 1)->first();
            $doctor = [
                'doctor_id' => $doctor_database->id,
                'name' => $doctor_database->name,
                'speciality' => fake()->randomElement($specilaity),
                'cost' => fake()->numberBetween($min = 50, $max = 200),
                'governorate' => $cities[$i],
                'latitude' => $latitude[$i],
                'rating' => rand(10, 50) / 10,
                'reviews' => rand(10, 30),
                'longitude' => $longitude[$i],
                'description' => fake()->text($maxNbChars = 200),
            ];
            \App\Models\DoctorProfile::create($doctor);
        }
        // ->create();
    }
}
