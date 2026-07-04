<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            UtilisateurSeeder::class,
            LieuSeeder::class,
            PostComptableSeeder::class,
            LigneComptableSeeder::class,
            EcritureComptableSeeder::class,
            TransformationSeeder::class,
        ]);
    }
}
