<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lieu extends Model
{
    /** @use HasFactory<\Database\Factories\LieuFactory> */
    use HasFactory;

    // les champs à remplir
    protected $fillable = ['code', 'libelle', 'adresse'];

    protected $table = 'lieux'; 
}
