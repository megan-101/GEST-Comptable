<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;
    //les champs que l'on peut remplir
    protected $fillable = ['matricule', 'nom', 'prenom', 'telephone', 'mail'];
}
