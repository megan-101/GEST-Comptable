<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostComptable extends Model
{
    /** @use HasFactory<\Database\Factories\PostComptableFactory> */
    use HasFactory;

<<<<<<< HEAD
        //les champs à remplir
        protected $fillable = ['id', 'capacite', 'libelle'];

         public  function fabricant(){
        return $this->hasOne(PostComptable::class);
       }

=======
    protected $fillable = ['capacite', 'libelle'];

    protected $table = 'post_comptables';
>>>>>>> origin/dev
}
