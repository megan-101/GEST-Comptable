<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostComptable;
use App\Interfaces\PostComptableInterface;


class PostComptableController extends Controller
{
    protected PostComptableInterface $PostComptableService;

    public function __construct(PostComptableInterface $PostComptableService) {
        $this->PostComptableService = $PostComptableService;
    }

    //
     public function all(){
            $listePostComptables = PostComptable::all();
            return view('PostComptables.liste_PostComptable', compact('listePostComptables'));

        } 

        public function formAjout(){
            return view('PostComptables.form_ajout_PostComptable');

        } 
        
        public function create(Request $create){
           $create->validate(
           [
                'capacite' =>'required',
                'libelle' =>'required',
            ]
        );

        PostComptable::create($create->all());
        return redirect()->route('PostComptables.All')->with('success', 'PostComptable ajouté avec succès.');


        }
        public function read( $id){
          $PostComptable =  PostComptable::find($id);
        return view('PostComptables.consulter_PostComptable', compact('PostComptable'));
        }

         public function formUpdate($id)
    {
        $PostComptable = PostComptable::findOrFail($id);
        return view('PostComptables.modifier_PostComptable', compact('PostComptable'));
    }
        public function update(Request $create, $id){
        $create->validate([
                'capacite' =>'required',
                'libelle' =>'required',
            ]);

          $PostComptable =  PostComptable::findOrFail($id);
          $PostComptable->update($create->all());
        return redirect()->route('PostComptables.All')->with('success', 'PostComptable ajouté avec succès.');
        }

        public function ConfirmDelete($id){
          $PostComptable =  PostComptable::find($id);


        return view('PostComptables.supprimer_PostComptable', compact('PostComptable'));

        }

        public function delete($id){

          $PostComptable =  PostComptable::findOrFail($id);
          $PostComptable ->delete();

        return redirect()->route('PostComptables.All')->with('success', 'PostComptable supprimer avec succès.');

        }
}
