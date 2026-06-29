<?php

namespace App\Http\Controllers;

use App\Models\Parametre;
use App\Interfaces\ParametreInterface;
use Illuminate\Http\Request;

class ParametreController extends Controller
{
    protected $parametreService;

    public function __construct(ParametreInterface $parametreService)
    {
        $this->parametreService = $parametreService;
    }

    /**
     * Liste tous les paramètres.
     */
    public function all()
    {
        $listeParametres = $this->parametreService->all();
        return view('parametres.liste_parametres', compact('listeParametres'));
    }

    /**
     * Affiche le formulaire de création.
     */
    public function formAjout()
    {
        return view('parametres.form_ajout_parametres');
    }

    /**
     * Enregistre un nouveau paramètre.
     */
    public function create(Request $request)
    {
        $this->parametreService->create($request);
        return redirect()->route('parametre.All');
    }

    /**
     * Affiche les détails d'un paramètre.
     */
    public function read($id)
    {
        $parametre = $this->parametreService->find($id);
        return view('parametres.consulter_parametres', compact('parametre'));
    }

    /**
     * Affiche le formulaire d'édition.
     */
    public function formModifier($id)
    {
        $parametre = $this->parametreService->find($id);
        return view('parametres.modifier_parametres', compact('parametre'));
    }

    /**
     * Met à jour le paramètre.
     */
    public function update(Request $request, $id)
    {
        $this->parametreService->update($request, $id);
        return redirect()->route('parametre.All');
    }

    /**
     * Supprime le paramètre (affiche la confirmation).
     */
    public function delete($id)
    {
        $parametre = $this->parametreService->find($id);
        return view('parametres.supprimer_parametres', compact('parametre'));
    }

    /**
     * Supprime définitivement le paramètre.
     */
    public function destroy($id)
    {
        $this->parametreService->delete($id);
        return redirect()->route('parametre.All');
    }
}
