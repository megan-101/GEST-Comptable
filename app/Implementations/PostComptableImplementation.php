<?php

namespace App\Implementations;

Use Illuminate\View\View;
Use Illuminate\Http\Request;
use App\Models\PostComptable;
use App\Interfaces\PostComptableInterface;




class PostComptableImplementation Implements PostComptableInterface
 {
// la logique metier des interfaces

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
