<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostComptable extends Model
{
    /** @use HasFactory<\Database\Factories\PostComptableFactory> */
    use HasFactory;

    //les champs à remplir
    protected $fillable = ['id', 'capacite', 'libelle'];

    protected $table = 'post_comptables';

    public  function fabricant(){
        return $this->hasOne(PostComptable::class);
       }

}
