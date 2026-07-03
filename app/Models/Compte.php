<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compte extends Model
{
    /** @use HasFactory<\Database\Factories\CompteFactory> */
    use HasFactory;

    protected $table = 'comptes';

    protected $fillable = [
        'valeur',
        'flag_modif',
    ];
}
