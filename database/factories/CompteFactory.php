<?php

namespace Database\Factories;

use App\Models\Compte;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<\App\Models\Compte>
 */
class CompteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = Compte::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'valeur' => $this->faker->word,
            'flag_modif' => $this->faker->randomElement(['0', '1']),
        ];
    }
}
