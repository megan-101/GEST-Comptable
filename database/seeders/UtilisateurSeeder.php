<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
<<<<<<< HEAD
=======
use App\Models\Utilisateur;
use Illuminate\Support\Facades\Hash;
>>>>>>> origin/dev

class UtilisateurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
<<<<<<< HEAD
        //
=======
        Utilisateur::create([
            'matricule' => 'ADM001',
            'login' => 'test',
            'nom' => 'Administrateur',
            'email' => 'admin@gmail.com',
            'mdp' => bcrypt('password1234'),
        ])->assignRole('Admin');
>>>>>>> origin/dev
    }
}
