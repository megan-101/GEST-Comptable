<?php

namespace Database\Seeders;

use App\Models\Lieu;
use Illuminate\Database\Seeder;

class LieuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Lieu::factory(10)->create();
    }
}
