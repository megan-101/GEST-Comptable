<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transformation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'ide_schema',
        'flag_piece',
        'mask_piece',
        'flag_compte',
        'mask_compte',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'ide_schema' => 'integer',
        'flag_piece' => 'boolean',
        'flag_compte' => 'boolean',
    ];
}
