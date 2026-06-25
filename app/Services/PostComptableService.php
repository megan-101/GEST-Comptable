<?php

namespace App\Http\Controllers;

use App\Models\PostComptable;
use Illuminate\Http\Request;

class PostComptableService {

    public function create (Request $create):PostComptable{
         $create->validate(
           [
                'id' =>'required|id|unique:PostComptables',
                'capacite' =>'required',
                'libelle' =>'required',


            ] 
        );
       return PostComptable::create($create->all());
       
    }
}

