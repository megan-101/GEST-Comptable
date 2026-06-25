<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ordinateur>
 */
class OrdinateurFactory extends Factory
{
    

    /**
     * Define the models default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id'=> fake()->randomNumber(8),
            'capacite'=> fake()->numberBetween(128, 1064),
            'libelle'=> fake()->randomElement(),
        ];
    
    }
}
