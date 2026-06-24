<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ordinateur extends Model
{
    /** @use HasFactory<\Database\Factories\OrdinateurFactory> */
    use HasFactory;

        //les champs à remplir
        protected $fillable = ['id', 'imei', 'ram', 'stockage', 'processeur','date_creation'];

         public  function fabricant(){
        return $this->hasOne(ordinateur::class);
       }

}
