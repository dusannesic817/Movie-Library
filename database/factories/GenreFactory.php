<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Genre>
 */
class GenreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $names_en = ['Action', 'Crimi', 'Thriller', 'Fantasy'];
        $names_sr = ['Akcija', 'Krimi', 'Triler', 'Fantazija'];

        $index = $this->faker->numberBetween(0, count($names_en) - 1);

        return [
            'name_en' => $names_en[$index],
            'name_sr' => $names_sr[$index]
        ];
    }
}
