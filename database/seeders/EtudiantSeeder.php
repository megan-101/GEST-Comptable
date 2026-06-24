<?php

namespace Database\Seeders;

use App\Models\Etudiant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EtudiantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
    Etudiant::factory(20)->create();

        // DB::table('etudiants')-> insert([
        //     'matricule'=> 'MAT001',
        //     'nom'=> 'ERISS',
        //     'prenom'=> 'Ryan',
        //     'telephone'=> '077889966',
        //     'mail'=> 'ryaneriss@imsa.ga',
        // ]); 

        // DB::table('etudiants')-> insert([
        //     'matricule'=> 'MAT002',
        //     'nom'=> 'DANY',
        //     'prenom'=> 'Glenn',
        //     'telephone'=> '07-889965',
        //     'mail'=> 'Danyglenn@imsa.ga',
        // ]); 
    }
}
