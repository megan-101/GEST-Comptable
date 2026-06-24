<?php

namespace Database\Seeders;

use App\Models\Batiments;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BatimentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       
        batiment::factory(4)->has(Ordinateur::factory(10))->create();
    }
}
