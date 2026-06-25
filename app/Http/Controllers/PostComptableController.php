<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Models\PostComptable;
use Illuminate\Services\PostComptableService;


class PostComptableController extends Controller
{
    //
     public function all(){
            $listePostComptables = PostComptable::all();
            return view('PostComptables.liste_PostComptables', compact('listePostComptables'));

        } 

        public function formAjout(){
            return view('PostComptables.form_ajout_PostComptables');

        } 
        
        public function create(Request $create){
           $create->validate(
           [
                'id' =>'required',
                'capacite' =>'required',
                'libelle' =>'required',
            ]
        );

        PostComptables::create($create->all());
        return redirect()->route('PostComptable.All');

        }
        public function read( $id){
          $PostComptable =  PostComptable::find($id);


        return view('PostComptables.consulter_PostComptables', compact('PostComptable'));

        }
        public function update(Request $create){
          $PostComptable =  PostComptable::find($id);


        return view('modifier_PostComptables', compact('PostComptable'));

        }
        public function delete(Request $create){
          $PostComptable =  PostComptable::find($id);


        return view('supprimer_PostComptable', compact('PostComptable'));

        }
}
