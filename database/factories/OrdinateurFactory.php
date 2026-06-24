<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ordinateur>
 */
class OrdinateurFactory extends Factory
{
    private $listeProcesseur=[
        'intel core x86 i3',
        'intel core x86 i5',
        'intel core x86 i7',
        'intel core x86 i9',
        'intel AND Ryzen 3',
        'intel AND Ryzen 3',
        'intel AND Ryzen 5',
        'intel AND Ryzen 7',
        'intel AND Ryzen 9'
    ];
    private $listeRam=[
         1, 2, 4, 8, 16, 32, 64, 128, 256, 512, 1024
    ];

    /**
     * Define the models default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'imei'=> fake()->randomNumber(8),
            'ram'=> fake()->randomElement($this->listeRam),  
            'stockage'=> fake()->numberBetween(128, 1064),
            'processeur'=> fake()->randomElement($this->listeProcesseur),
            'date_creation'=> new \DateTime(),
        ];
    
    }
}
