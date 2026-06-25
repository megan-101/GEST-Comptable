<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Models\Ordinateur;
use Illuminate\Services\OrdinateurService;


class OrdinateurController extends Controller
{
    //
     public function all(){
            $listeordinateurs = ordinateurs::all();
            return view('ordinateurs.liste_ordinateurs', compact('listeOrdinateurs'));

        } 

        public function formAjout(){
            return view('ordinateurs.form_ajout_ordinateurs');

        } 
        
        public function create(Request $create){
           $create->validate(
           [
                'id' =>'required',
                'capacite' =>'required',
                'libelle' =>'required',
            ]
        );

        Ordinateurs::create($create->all());
        return redirect()->route('ordinateur.All');

        }
        public function read( $id){
          $ordinateur =  ordinateur::find($id);


        return view('ordinateurs.consulter_ordinateurs', compact('ordinateur'));

        }
        public function update(Request $create){
          $ordinateur =  ordinateur::find($id);


        return view('modifier_ordinateurs', compact('ordinateur'));

        }
        public function delete(Request $create){
          $ordinateur =  ordinateur::find($id);


        return view('supprimer_ordinateur', compact('ordinateur'));

        }
}
