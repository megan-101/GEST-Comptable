<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            User::create([
        'name' => 'Ryan Eriss',
        'email' => 'superadmin@gmail.com',
        'password' => bcrypt('password'),
    ])->assignRole('super_admin'); 


    User::create([
        'name' => 'Anne Marie',
        'email' => 'annemarie@gmail.com',
        'password' => bcrypt('password'),
    ])->assignRole('admin'); 



    User::create([
        'name' => 'Fabrice Yacoubah',
        'email' => 'yacouba@gmail.com',
        'password' => bcrypt('password'),
    ])->assignRole('utilisateur'); 



    User::create([
        'name' => 'Emmanuel Dlv',
        'email' => 'emmanueldlv@gmail.com',
        'password' => bcrypt('password'),
    ])->assignRole('validateur'); 
        //
    }
}
