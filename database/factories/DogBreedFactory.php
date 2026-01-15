<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\DogBreed;


class DogBreedFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DogBreed::class;

    /**
     * Define the model's default state.
     *
     * @return array<string,mixed>
     */
    public function definition(): array
    {
        $breeds = ['Labrador Retriever', 'German Shepherd', 'Golden Retriever', 'Bulldog', 'Beagle', 'Poodle', 'Rottweiler', 'Siberian Husky'];
        $countries = ['United Kingdom', 'Germany', 'United States', 'France', 'Spain', 'Russia', 'Japan', 'Australia'];

        return [
            'name' => fake()->unique()->randomElement($breeds),
            'origin_country' => fake()->randomElement($countries),
            'height_cm' => fake()->numberBetween(20, 80),
            'weight_kg' => fake()->numberBetween(5, 50),
            'recognized_since' => fake()->year(),
        ];
    }
}
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
