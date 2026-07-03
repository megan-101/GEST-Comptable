<?php

namespace Database\Seeders;


use App\Models\PostComptable;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostComptableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            PostComptable::factory(10)->create();

    }
}
