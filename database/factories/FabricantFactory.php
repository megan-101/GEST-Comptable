<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\fabricant>
 */
class FabricantFactory extends Factory
{

    private $listeFabricant =[
        'AZUS',
        'HP',
        'Dell',
        'Lenovo',
        'Aliemware',
        'Azer',
        'iSamsung',
        'Toshiba',
        'Mackbook',
        'MSI'
    ];
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
           'code' => 'FAB'.fake()->unique()->randomNumber(6),
           'libelle'  =>fake()->randomElement($this->listeFabricant) 
        ];
    }
}
 