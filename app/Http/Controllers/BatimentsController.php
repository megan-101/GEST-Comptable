<?php

namespace App\Http\Controllers;

use App\Models\Batiments;
use Illuminate\Http\Request;

class BatimentsController extends Controller
{
    //
     public function all(){
            $listebatiments = batiments::all();
            return view('batiments.liste_batiments', compact('listebatiments'));

        } 

        public function formAjout(){
            return view('batiments.form_ajout_batiments');

        } 
        
        public function create(Request $create){
           $create->validate(
           [
                'ibn' =>'required',
                'nom_batiment' =>'required',
                'nom_propriétaire' =>'required',
            ]
        );

        Batiments::create($create->all());
        return redirect()->route('batiment.All');

        }
        public function read( $id){
          $batiment =  batiment::find($id);


        return view('batiments.consulter_batiments', compact('batiment'));

        }
        public function update(Request $create){
          $batiment =  batiment::find($id);


        return view('modifier_batiments', compact('batiment'));

        }
        public function delete(Request $create){
          $batiment =  batiment::find($id);


        return view('supprimer_batiment', compact('batiment'));

        }
     
}
