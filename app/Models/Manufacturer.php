<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    /** @use HasFactory<\Database\Factories\ManufacturerFactory> */
    //use HasFactory;

    // les champs à remplir
    protected $fillable = ['code', 'nom', 'prenom', 'numtel'];

    protected $table = 'manufacturers';
}
