<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\DogBreed;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DogBreed>
 */
class DogBreedFactory extends Factory
{
    protected $model = DogBreed::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'origin_country' => $this->faker->country(),
            'height_cm' => $this->faker->numberBetween(30, 80),
            'weight_kg' => $this->faker->numberBetween(5, 50),
            'recognized_since' => $this->faker->numberBetween(1800, 2020),
        ];
    }
}
