<?php

namespace Database\Seeders;

use App\Models\Ordinateur;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class OrdinateurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            Ordinateur::factory(10)->create();

    }
}
