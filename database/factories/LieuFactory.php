<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lieu>
 */
class LieuFactory extends Factory
{
    private $listeVilles = [
        'Dakar',
        'Thiès',
        'Ziguinchor',
        'Saint-Louis',
        'Kaolack',
        'Mbour',
        'Touba',
        'Louga',
        'Tambacounda',
        'Diourbel',
    ];

    private $listeQuartiers = [
        'Plateau',
        'HLM',
        'Médina',
        'Grand Yoff',
        'Mermoz',
        'Point E',
        'Liberté 6',
        'Parcelles Assainies',
        'Pikine',
        'Guédiawaye',
    ];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $ville = fake()->randomElement($this->listeVilles);
        $quartier = fake()->randomElement($this->listeQuartiers);

        return [
            'code'    => 'LIE' . fake()->unique()->randomNumber(5, true),
            'libelle' => $ville . ' - ' . $quartier,
            'adresse' => fake()->buildingNumber() . ', ' . $quartier . ', ' . $ville,
        ];
    }
}
