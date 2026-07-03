<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EcritureComptable extends Model
{
    /** @use HasFactory<\Database\Factories\EcritureComptableFactory> */
    use HasFactory;

    protected $table = 'ecriture_comptables';

    protected $fillable = [
        'numero',
        'date',
        'operation_id',
        'devise'
    ];
}
