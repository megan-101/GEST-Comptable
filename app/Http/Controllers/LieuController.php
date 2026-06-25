<?php

namespace App\Http\Controllers;

use App\Models\Lieu;
use Illuminate\Http\Request;

class LieuController extends Controller
{
    // Liste de tous les lieux
    public function all()
    {
        $listeLieux = Lieu::all();
        return view('lieux.liste_lieux', compact('listeLieux'));
    }

    // Formulaire d'ajout
    public function formAjout()
    {
        return view('lieux.form_ajout_lieu');
    }

    // Création d'un lieu
    public function create(Request $request)
    {
        $request->validate([
            'code'    => 'required|unique:lieux,code',
            'libelle' => 'required',
            'adresse' => 'required',
        ]);

        Lieu::create($request->only(['code', 'libelle', 'adresse']));

        return redirect()->route('lieu.All')->with('success', 'Lieu ajouté avec succès.');
    }

    // Consulter un lieu
    public function read($id)
    {
        $lieu = Lieu::findOrFail($id);
        return view('lieux.consulter_lieu', compact('lieu'));
    }

    // Formulaire de modification
    public function formUpdate($id)
    {
        $lieu = Lieu::findOrFail($id);
        return view('lieux.modifier_lieu', compact('lieu'));
    }

    // Mise à jour d'un lieu
    public function update(Request $request, $id)
    {
        $request->validate([
            'code'    => 'required|unique:lieux,code,' . $id,
            'libelle' => 'required',
            'adresse' => 'required',
        ]);

        $lieu = Lieu::findOrFail($id);
        $lieu->update($request->only(['code', 'libelle', 'adresse']));

        return redirect()->route('lieu.All')->with('success', 'Lieu modifié avec succès.');
    }

    // Confirmation de suppression
    public function confirmDelete($id)
    {
        $lieu = Lieu::findOrFail($id);
        return view('lieux.supprimer_lieu', compact('lieu'));
    }

    // Suppression d'un lieu
    public function delete(Request $request)
    {
        $lieu = Lieu::findOrFail($request->id);
        $lieu->delete();

        return redirect()->route('lieu.All')->with('success', 'Lieu supprimé avec succès.');
    }
}
