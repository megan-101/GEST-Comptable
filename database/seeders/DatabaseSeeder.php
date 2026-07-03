<?php

namespace Database\Seeders;

use App\Models\Lieu;
use App\Models\Utilisateur;
use App\Models\EcritureComptable;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Lieu::factory(10)->create();
        EcritureComptable::factory(10)->create();
        $this->call([
            LigneComptableSeeder::class,
        ]);
    }
}
