<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostComptable extends Model
{
    /** @use HasFactory<\Database\Factories\PostComptableFactory> */
    use HasFactory;

    protected $fillable = ['capacite', 'libelle'];

    protected $table = 'post_comptables';
}
