<?php

namespace App\Http\Controllers;

use App\Models\ModeleTransformation;
use Illuminate\Http\Request;

class ModeleTransformationController extends Controller
{
    /**
     * Liste tous les modèles de transformation.
     */
    public function all()
    {
        $listeModeles = ModeleTransformation::all();
        return view('modeles_transformation.liste_modeles', compact('listeModeles'));
    }

    /**
     * Affiche le formulaire de création.
     */
    public function formAjout()
    {
        return view('modeles_transformation.form_ajout_modele');
    }

    /**
     * Enregistre un nouveau modèle.
     */
    public function create(Request $request)
    {
        $request->validate([
            'schema'      => 'required|string|max:255',
            'mask_piece'  => 'nullable|string|max:255',
            'mask_compte' => 'nullable|string|max:255',
        ]);

        $data = $request->only(['schema', 'mask_piece', 'mask_compte']);
        $data['flag_piece'] = $request->has('flag_piece');
        $data['flag_compte'] = $request->has('flag_compte');

        ModeleTransformation::create($data);

        return redirect()->route('modele-transformation.All')->with('success', 'Modèle de transformation ajouté avec succès.');
    }

    /**
     * Affiche les détails d'un modèle.
     */
    public function read($id)
    {
        $modele = ModeleTransformation::findOrFail($id);
        return view('modeles_transformation.consulter_modele', compact('modele'));
    }

    /**
     * Affiche le formulaire d'édition.
     */
    public function formModifier($id)
    {
        $modele = ModeleTransformation::findOrFail($id);
        return view('modeles_transformation.modifier_modele', compact('modele'));
    }

    /**
     * Met à jour un modèle.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'schema'      => 'required|string|max:255',
            'mask_piece'  => 'nullable|string|max:255',
            'mask_compte' => 'nullable|string|max:255',
        ]);

        $modele = ModeleTransformation::findOrFail($id);

        $data = $request->only(['schema', 'mask_piece', 'mask_compte']);
        $data['flag_piece'] = $request->has('flag_piece');
        $data['flag_compte'] = $request->has('flag_compte');

        $modele->update($data);

        return redirect()->route('modele-transformation.All')->with('success', 'Modèle de transformation modifié avec succès.');
    }

    /**
     * Page de confirmation de suppression.
     */
    public function delete($id)
    {
        $modele = ModeleTransformation::findOrFail($id);
        return view('modeles_transformation.supprimer_modele', compact('modele'));
    }

    /**
     * Supprime définitivement un modèle.
     */
    public function destroy($id)
    {
        $modele = ModeleTransformation::findOrFail($id);
        $modele->delete();

        return redirect()->route('modele-transformation.All')->with('success', 'Modèle de transformation supprimé avec succès.');
    }
}
