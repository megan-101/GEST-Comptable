<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fabricant extends Model
{
    /** @use HasFactory<\Database\Factories\FabricantFactory> */
    use HasFactory;

               
     //les champs à remplir
        protected $fillable = ['code', 'libelle'];


       public  function ordinateurs(){
        return $this->hasMany(Ordinateur::class);
       }

}
