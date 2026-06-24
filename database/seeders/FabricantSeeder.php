<?php

namespace Database\Seeders;

use App\Models\Fabricant;
use App\Models\Ordinateur;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FabricantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Fabricant::factory(3)->has(Ordinateur::factory(10))->create();
    }
}
