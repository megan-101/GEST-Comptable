<?php

namespace App\Http\Controllers;

use App\Models\Fabricant;
use Illuminate\Http\Request;

class OrdinateurService {

    public function create (Request $create):Ordinateur{
         $create->validate(
           [
                'id' =>'required|id|unique:ordinateurs',
                'capacite' =>'required',
                'libelle' =>'required',


            ] 
        );
       return Ordinateur::create($create->all());
       
    }
}

