<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EcritureComptable>
 */
class EcritureComptableFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'numero' => $this->faker->unique()->bothify('EC-####'),
            'date' => $this->faker->date(),
            'operation_id' => $this->faker->randomNumber(4),
            'devise' => $this->faker->randomElement(['EUR', 'USD', 'CAD', 'CHF']),
        ];
    }
}
