<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DogBreed;

class DogBreedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $templates = [
            [
                'name' => 'Labrador Retriever',
                'origin_country' => 'United Kingdom',
                'height_cm' => 57,
                'weight_kg' => 30,
                'recognized_since' => 1850,
            ],
            [
                'name' => 'German Shepherd',
                'origin_country' => 'Germany',
                'height_cm' => 62,
                'weight_kg' => 35,
                'recognized_since' => 1899,
            ],
            [
                'name' => 'Beagle',
                'origin_country' => 'United Kingdom',
                'height_cm' => 38,
                'weight_kg' => 10,
                'recognized_since' => 1800,
            ],
            [
                'name' => 'Siberian Husky',
                'origin_country' => 'Russia',
                'height_cm' => 54,
                'weight_kg' => 25,
                'recognized_since' => 1908,
            ],
            [
                'name' => 'Poodle',
                'origin_country' => 'Germany',
                'height_cm' => 45,
                'weight_kg' => 20,
                'recognized_since' => 1887,
            ],
        ];

        foreach ($templates as $data) {
            DogBreed::create($data);
        }

        // Add additional random breeds
        DogBreed::factory()->count(10)->create();
    }
}
