<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Transformation;

class TransformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $transformations = [
            [
                'ide_schema'  => 1,
                'flag_piece'  => true,
                'mask_piece'  => 'FAC-###',
                'flag_compte' => true,
                'mask_compte' => '411###',
            ],
            [
                'ide_schema'  => 2,
                'flag_piece'  => false,
                'mask_piece'  => null,
                'flag_compte' => true,
                'mask_compte' => '401###',
            ],
            [
                'ide_schema'  => 3,
                'flag_piece'  => true,
                'mask_piece'  => 'REG-##-####',
                'flag_compte' => false,
                'mask_compte' => null,
            ],
        ];

        foreach ($transformations as $data) {
            Transformation::create($data);
        }
    }
}
