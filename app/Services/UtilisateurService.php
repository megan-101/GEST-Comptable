<?php

namespace App\Http\Controllers;

use App\Models\Fabricant;
use Illuminate\Http\Request;

class UtilisateurService {

    public function create (Request $create):Utilisateur{
         $create->validate(
           [
                'nom' =>'required',
                'prenom' =>'required',
                'email' =>'required|email|unique:utilisateurs',
                'telephone' =>'required|telephone|unique:utilisateurs',

            ] 
        );
       return Utilisateur::create($create->all());
       
    }
}

