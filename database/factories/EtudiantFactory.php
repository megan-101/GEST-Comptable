<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Etudiant>
 */
class EtudiantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [                        
            'matricule'=> 'MAT'.fake()->unique()->randomNumber(6),
            'nom'=> fake()->firstname(),
            'prenom'=> fake()->lastname(),
            'telephone'=> '+241 77'. fake()->unique()->randomNumber(6),
            'mail'=> fake()->unique()->safeEmail(),       
        ];
    }
}
