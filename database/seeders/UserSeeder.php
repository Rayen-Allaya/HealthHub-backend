<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $images = [
            "1.JPG",
            "2.JPG",
            "3.JPEG",
            "4.JPG",
            "5.WEBP",
            "6.JPG",
            "7.JPEG",
            "8.WEBP",
            "9.WEBP",
            "10.JPEG",
            "11.JPEG",
            "12.JPG",
            "13.JPG",
            "14.JPG",
            "15.JPEG",
            "16.WEBP",
            "17.JPG",
            "18.JPEG",
            "19.JPG",
            // "20.JPG",
            "20.WEBP",
            "21.JPEG",
            "22.JPEG",
            "23.WEBP",
            "24.JPG",
            "25.JPG",
            // "25.WEBP",
            "26.JPG",
            "27.WEBP",
            "28.JPG",
            "29.JPG",
            "30.JPG",
            "31.JPEG",
            "32.WEBP",
            "33.JPG",
            "34.JPEG",
            "35.JPEG",
            "36.JPEG",
            "37.JPEG",
            "38.JPEG",
            "39.JPEG",
            "40.JPG"
        ];
        $names = [
            "Dr. Fatma Guezmir",
            "Dr. Youssef Ben Ali",
            "Dr. Leila Kharrat",
            "Dr. Selma Ben Amor",
            "Dr. Karim Khemiri",
            "Dr. Anis Gharbi",
            "Dr. Hichem Jaziri",
            "Dr. Maher Bouazizi",
            "Dr. Zied Ferjani",
            "Dr. Walid Mabrouk",
            "Dr. Riadh Trabelsi",
            "Dr. Nizar Ben Amor",
            "Dr. Imad Chakroun",
            "Dr. Slim Kallel",
            "Dr. Wassim Bouhlel",
            "Dr. Khaled Zouari",
            "Dr. Amine Mezlini",
            "Dr. Sami Elloumi",
            "Dr. Amina Ben Youssef",
            "Dr. Leila Kharrat",
            "Dr. Fatma Guezmir",
            "Dr. Hayet Chaker",
            "Dr. Ines Bouhlel",
            "Dr. Selma Ben Amor",
            "Dr. Rania Belhaj",
            "Dr. Nesrine Trabelsi",
            "Dr. Sana Mezlini",
            "Dr. Nour Kallel",
            "Dr. Salma Bouzidi",
            "Dr. Rim Bouhaddi",
            "Dr. Lamia Ghanmi",
            "Dr. Amira Lahmar",
            "Dr. Houda Sghaier",
            "Dr. Chiraz Ben Ayed",
            "Dr. Maha Masmoudi",
            "Dr. Asma Ben Slimane",
            "Dr. Yosra Haddad",
            "Dr. Dina Attia",
            "Dr. Fadi Gharsallah",
            "Dr. Hatem Hammami",
            "Dr. Mohsen Guesmi",
            "Dr. Saber Maalej",
            "Dr. Nabil Mansour"
        ];
        for ($i = 1; $i <= 40; $i++) {
            \App\Models\User::factory(1)->create(["password" => '$2a$12$CHCDZx9MoTwZTB2ufpTCFexchP.Qk00xKn88XwANsw8kjl4fYQGPe', 'name' => $names[$i - 1], 'image' => "/images/doctors/" . strtolower($images[$i - 1]), 'role' => "doctor",]);
        }

        for ($i = 1; $i <= 60; $i++) {
            \App\Models\User::factory(1)->create(["password" => '$2a$12$CHCDZx9MoTwZTB2ufpTCFexchP.Qk00xKn88XwANsw8kjl4fYQGPe', 'image' => "/images/anonymousUser.jpeg", 'role' => "user",]);
        }
    }
}
