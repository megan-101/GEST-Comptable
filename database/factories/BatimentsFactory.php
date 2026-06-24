<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Batiments>
 */
class BatimentsFactory extends Factory
{

 private $listebatiments =[
        'E6',
        'B3',
        'D1',
        'A2',
        'A3',
        
    ];
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
           'ibn' => 'FAB'.fake(),
           'nom_batiment'  =>fake(), 
           'nom_propriétaire'  =>fake() 
        
        ];
    }
}
