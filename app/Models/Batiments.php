<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batiments extends Model
{
    /** @use HasFactory<\Database\Factories\BatimentsFactory> */
    use HasFactory;

    //les champs à remplir
        protected $fillable = ['ibn', 'nom_batiment','nom_batiment'];


       public  function batiments(){
        return $this->hasMany(Batiments::class);
       }
}
