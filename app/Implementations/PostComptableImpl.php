<?php

namespace App\Implementations;

use App\Events\PostComptableEvent;
use App\Interfaces\PostComptableInterface;
use App\Models\PostComptable;
use Illuminate\Http\Request;

class PostComptableImpl implements PostComptableInterface
{
    public function all()
    {
        $postComptable = PostComptable::all();
        event(new PostComptableEvent("Affichage de la liste des postes comptables", "Le nombre de poste comptable retournés est : " . $postComptable->count()));
        return view('postcomptable.All', compact('postcomptable') );
        
    }

    public function create(Request $request)
    {
        $request->validate([
            'capacite' => 'required|numeric',
            'libelle' => 'required',
        ]);

        $createdPostComptable = PostComptable::create($request->all());

        event(new PostComptableEvent("Création d'un poste comptable", "Le Poste Comptable créé est : " .$createdPostComptable));
        return $createdPostComptable;
       
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'capacite' => 'required|numeric',
            'libelle' => 'required',
        ]);

        $result= $postComptable->update($request, $id ->all());

        event(new PostComptableEvent("Modification d'un poste comptable", "Le Poste Comptable modifié est : " . $createdPostComptable));
        return $result;
    }

    public function find($id)
    {
        $postComptable= PostComptable::findOrFail($id);
        event(new PostComptableEvent("Consultation du poste comptable", "Le  poste comptable consulté est : " . $postComptable->$id()));
        return view('postcomptables.consulter_postcomptables', compact('postcomptable'));
    }

    public function delete($id)
    {
        $result = $postComptable->delete($id);
        event(new PostComptableEvent("Suppression d'un poste comptable", "L'utilisateur supprimé est : " . $createdPostComptable));
        return $result;
    }
}
