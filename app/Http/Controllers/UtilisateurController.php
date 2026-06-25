<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use Illuminate\Http\Request;
use App\Services\UtlisateurService;

class UtilisateurController extends Controller
{
    //
        public function all(){
            $listeUtilisateurs = Utilisateur::all();
            return view('Utilisateurs.liste_Utilisateurs', compact('listeUtilisateurs'));

        } 

        public function formAjout(){
            return view('Utilisateurs.form_ajout_Utilisateurs');

        } 
        
        public function create(Request $create){
           $create->validate(
           [
                'id' =>'required',
                'libelle' =>'required',
            ] 
        );

        Utilisateur::create($create->all());
        return redirect()->route('Utilisateur.All');

        }
        public function read( $id){
          $Utilisateur =  Utilisateur::find($id);


        return view('Utilisateurs.consulter_Utilisateurs', compact('Utilisateur'));

        }
        public function update(Request $create){
          $Utilisateur =  Utilisateur::find($id);


        return view('modifier_Utilisateurs', compact('Utilisateur'));

        }
        public function delete(Request $create){
          $Utilisateur =  Utilisateur::find($id);


        return view('supprimer_Utilisateur', compact('Utilisateur'));

        }
     
        
}
