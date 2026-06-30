<?php

namespace App\implementations;

use App\Models\Lieu;
use App\interfaces\LieuInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LieuImp implements LieuInterface
{
    // Liste de tous les lieux
    public function all()
    {
        try {
            $listeLieux = Lieu::all();
            return view('lieux.liste_lieux', compact('listeLieux'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erreur lors de la récupération des lieux.');
        }
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

        try {
            DB::beginTransaction();
            $createdLieu = Lieu::create($request->only(['code', 'libelle', 'adresse']));
            event(new \App\Events\LieuEvent($createdLieu));
            DB::commit();
            return redirect()->route('lieu.All')->with('success', 'Lieu ajouté avec succès.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Erreur lors de la création du lieu.');
        }
    }

    // Consulter un lieu
    public function read($id)
    {
        try {
            $lieu = Lieu::findOrFail($id);
            return view('lieux.consulter_lieu', compact('lieu'));
        } catch (\Exception $e) {
            return redirect()->route('lieu.All')->with('error', 'Lieu introuvable.');
        }
    }

    // Formulaire de modification
    public function formUpdate($id)
    {
        try {
            $lieu = Lieu::findOrFail($id);
            return view('lieux.modifier_lieu', compact('lieu'));
        } catch (\Exception $e) {
            return redirect()->route('lieu.All')->with('error', 'Lieu introuvable.');
        }
    }

    // Mise à jour d'un lieu
    public function update(Request $request, $id)
    {
        $request->validate([
            'code'    => 'required|unique:lieux,code,' . $id,
            'libelle' => 'required',
            'adresse' => 'required',
        ]);

        try {
            DB::beginTransaction();
            $lieu = Lieu::findOrFail($id);
            $lieu->update($request->only(['code', 'libelle', 'adresse']));
            event(new \App\Events\LieuUpdatedEvent($lieu));
            DB::commit();
            return redirect()->route('lieu.All')->with('success', 'Lieu modifié avec succès.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Erreur lors de la mise à jour.');
        }
    }

    // Confirmation de suppression
    public function confirmDelete($id)
    {
        try {
            $lieu = Lieu::findOrFail($id);
            return view('lieux.supprimer_lieu', compact('lieu'));
        } catch (\Exception $e) {
            return redirect()->route('lieu.All')->with('error', 'Lieu introuvable.');
        }
    }

    // Suppression d'un lieu
    public function delete(Request $request)
    {
        try {
            DB::beginTransaction();
            $lieu = Lieu::findOrFail($request->id);
            $lieu->delete();
            event(new \App\Events\LieuDeletedEvent($lieu));
            DB::commit();
            return redirect()->route('lieu.All')->with('success', 'Lieu supprimé avec succès.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Erreur lors de la suppression.');
        }
    }
}
