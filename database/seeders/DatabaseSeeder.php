<?php

namespace Database\Seeders;

use App\Models\Lieu;
use App\Models\Utilisateur;
<<<<<<< HEAD
=======
use App\Models\EcritureComptable;
>>>>>>> origin/dev
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Lieu::factory(10)->create();
<<<<<<< HEAD
=======
        EcritureComptable::factory(10)->create();
        $this->call([
            LigneComptableSeeder::class,
        ]);
    }
}
