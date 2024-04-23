<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Film>
 */
class FilmFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            [
                'name' => 'The Godfather',
                'year' => 1972,
                'runing_h' => 2,
                'runing_m' => 30,
                'rating' => 9.2
            ],
            [
                'name' => 'Inception',
                'year' => 2013,
                'runing_h' => 2,
                'runing_m' => 10,
                'rating' => 8.5
            ],
            [
                'name' => 'Forest Gump',
                'year' => 1994,
                'runing_h' => 2,
                'runing_m' => 21,
                'rating' => 8.6
            ],
            [
                'name' => 'The Green Mile',
                'year' => 1999,
                'runing_h' => 2,
                'runing_m' => 10,
                'rating' => 8.2
            ]
        ];
        }
}
