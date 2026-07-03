<?php

namespace App\Http\Controllers;

use App\Models\Parametre;
use App\Interfaces\ParametreInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Exception;

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
        try {
            $listeParametres = $this->parametreService->all();
            return view('parametres.liste_parametres', compact('listeParametres'));
        } catch (Exception $e) {
            Log::error("Erreur lors de la récupération de la liste des paramètres : " . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Erreur lors de la récupération des paramètres.']);
        }
    }

    /**
     * Affiche le formulaire de création.
     */
    public function formAjout()
    {
        try {
            return view('parametres.form_ajout_parametres');
        } catch (Exception $e) {
            Log::error("Erreur lors de l'affichage du formulaire d'ajout : " . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Impossible d\'afficher le formulaire d\'ajout.']);
        }
    }

    /**
     * Enregistre un nouveau paramètre.
     */
    public function create(Request $request)
    {
        try {
            $this->parametreService->create($request);
            return redirect()->route('parametre.All');
        } catch (Exception $e) {
            Log::error("Erreur lors de la création du paramètre : " . $e->getMessage());
            return redirect()->back()->withInput()->withErrors(['error' => 'Erreur lors de la création du paramètre.']);
        }
    }

    /**
     * Affiche les détails d'un paramètre.
     */
    public function read($id)
    {
        try {
            $parametre = $this->parametreService->find($id);
            return view('parametres.consulter_parametres', compact('parametre'));
        } catch (Exception $e) {
            Log::error("Erreur lors de la consultation du paramètre $id : " . $e->getMessage());
            return redirect()->route('parametre.All')->withErrors(['error' => 'Paramètre introuvable.']);
        }
    }

    /**
     * Affiche le formulaire d'édition.
     */
    public function formModifier($id)
    {
        try {
            $parametre = $this->parametreService->find($id);
            return view('parametres.modifier_parametres', compact('parametre'));
        } catch (Exception $e) {
            Log::error("Erreur lors de l'affichage du formulaire de modification du paramètre $id : " . $e->getMessage());
            return redirect()->route('parametre.All')->withErrors(['error' => 'Impossible de charger le formulaire de modification.']);
        }
    }

    /**
     * Met à jour le paramètre.
     */
    public function update(Request $request, $id)
    {
        try {
            $this->parametreService->update($request, $id);
            return redirect()->route('parametre.All');
        } catch (Exception $e) {
            Log::error("Erreur lors de la modification du paramètre $id : " . $e->getMessage());
            return redirect()->back()->withInput()->withErrors(['error' => 'Erreur lors de la mise à jour du paramètre.']);
        }
    }

    /**
     * Supprime le paramètre (affiche la confirmation).
     */
    public function delete($id)
    {
        try {
            $parametre = $this->parametreService->find($id);
            return view('parametres.supprimer_parametres', compact('parametre'));
        } catch (Exception $e) {
            Log::error("Erreur lors de la tentative de suppression du paramètre $id : " . $e->getMessage());
            return redirect()->route('parametre.All')->withErrors(['error' => 'Erreur lors de la tentative de suppression.']);
        }
    }

    /**
     * Supprime définitivement le paramètre.
     */
    public function destroy($id)
    {
        try {
            $this->parametreService->delete($id);
            return redirect()->route('parametre.All');
        } catch (Exception $e) {
            Log::error("Erreur lors de la suppression du paramètre $id : " . $e->getMessage());
            return redirect()->route('parametre.All')->withErrors(['error' => 'Erreur lors de la suppression du paramètre.']);
        }
    }
}
