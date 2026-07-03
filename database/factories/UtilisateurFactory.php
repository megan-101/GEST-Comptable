<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Utilisateur>
 */
class UtilisateurFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "matricule" =>"MAT-" . fake()->unique()->numberBetween(1000, 9999),
            "login" => fake()->unique()->userName,
            "nom" => fake()->name,
            "mdp" => fake()->password
        ];
    }
}
