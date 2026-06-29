<?php

namespace App\Implementations;

Use Illuminate\View\View;
Use Illuminate\Http\Request;
use App\Models\PostComptable;
use App\Events\PostComptableEvent;

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
        //recupere le postcomptable inserer dans la base
       $createdPostComptable = PostComptable::create($create->all());

       //creation du nouvel evenement

      $newPostComptableEvent = new PostComptableEvent($createdPostComptable);

      // on emmet l'evenement 
      event($newPostComptableEvent);
      
      return  $createdPostComptable;
       
    }

}
