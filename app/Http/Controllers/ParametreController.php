<?php

namespace App\Http\Controllers;

use App\Models\Parametre;
<<<<<<< HEAD
use App\Services\ParametreService;
use Illuminate\Http\Request;
=======
use App\Interfaces\ParametreInterface;
use App\Interfaces\LogInterface;
use Illuminate\Http\Request;
use Exception;
>>>>>>> origin/dev

class ParametreController extends Controller
{
    protected $parametreService;
<<<<<<< HEAD

    public function __construct(ParametreService $parametreService)
    {
        $this->parametreService = $parametreService;
=======
    protected LogInterface $logInterface;

    public function __construct(ParametreInterface $parametreService, LogInterface $logInterface)
    {
        $this->parametreService = $parametreService;
        $this->logInterface = $logInterface;
>>>>>>> origin/dev
    }

    /**
     * Liste tous les paramètres.
     */
    public function all()
    {
<<<<<<< HEAD
        $listeParametres = Parametre::all();
        return view('parametres.liste_parametres', compact('listeParametres'));
=======
        try {
            $listeParametres = $this->parametreService->all();
            if ($listeParametres === null) {
                $this->logInterface->save([
                    'modele' => 'PARAMETRE',
                    'action' => 'Tentative de Lister Tous les Paramètres',
                    'statut' => 'ECHEC',
                    'message' => 'Une erreur est survenue lors de la récupération des paramètres',
                    'ip_address' => request()->ip(),
                ]);
            } else {
                $this->logInterface->save([
                    'modele' => 'PARAMETRE',
                    'action' => 'Lister Tous les Paramètres',
                    'statut' => 'SUCCES',
                    'message' => 'Tous les paramètres ont été affichés avec succès',
                    'ip_address' => request()->ip(),
                ]);
                return view('parametres.liste_parametres', compact('listeParametres'));
            }
        } catch (Exception $e) {
            $this->logInterface->save([
                'modele' => 'PARAMETRE',
                'action' => 'Tentative de Lister Tous les Paramètres',
                'statut' => 'ECHEC',
                'message' => $e->getMessage(),
                'ip_address' => request()->ip(),
            ]);
            return redirect()->back()->withErrors(['error' => 'Erreur lors de la récupération des paramètres.']);
        }
>>>>>>> origin/dev
    }

    /**
     * Affiche le formulaire de création.
     */
    public function formAjout()
    {
<<<<<<< HEAD
        return view('parametres.form_ajout_parametres');
=======
        try {
            $this->logInterface->save([
                'modele' => 'PARAMETRE',
                'action' => 'Redirection vers le formulaire d\'ajout',
                'statut' => 'SUCCES',
                'message' => 'Affichage du formulaire d\'ajout avec succès',
                'ip_address' => request()->ip(),
            ]);
            return view('parametres.form_ajout_parametres');
        } catch (Exception $e) {
            $this->logInterface->save([
                'modele' => 'PARAMETRE',
                'action' => 'Tentative de redirection vers le formulaire d\'ajout',
                'statut' => 'ECHEC',
                'message' => $e->getMessage(),
                'ip_address' => request()->ip(),
            ]);
            return redirect()->back()->withErrors(['error' => 'Impossible d\'afficher le formulaire d\'ajout.']);
        }
>>>>>>> origin/dev
    }

    /**
     * Enregistre un nouveau paramètre.
     */
    public function create(Request $request)
    {
<<<<<<< HEAD
        $this->parametreService->create($request);
        return redirect()->route('parametre.All');
=======
        try {
            $createdParametre = $this->parametreService->create($request);
            if ($createdParametre === null) {
                $this->logInterface->save([
                    'modele' => 'PARAMETRE',
                    'action' => 'Tentative de Création de Paramètre',
                    'statut' => 'ECHEC',
                    'message' => 'Une erreur est survenue lors de la création du paramètre',
                    'ip_address' => request()->ip(),
                ]);
                return redirect()->back()->withInput()->withErrors(['error' => 'Erreur lors de la création du paramètre.']);
            } else {
                $this->logInterface->save([
                    'modele' => 'PARAMETRE',
                    'action' => 'Création de Paramètre',
                    'statut' => 'SUCCES',
                    'message' => 'Paramètre créé avec succès, ID: ' . $createdParametre->id,
                    'ip_address' => request()->ip(),
                ]);
                return redirect()->route('parametre.All');
            }
        } catch (Exception $e) {
            $this->logInterface->save([
                'modele' => 'PARAMETRE',
                'action' => 'Tentative de Création de Paramètre',
                'statut' => 'ECHEC',
                'message' => $e->getMessage(),
                'ip_address' => request()->ip(),
            ]);
            return redirect()->back()->withInput()->withErrors(['error' => 'Erreur lors de la création du paramètre.']);
        }
>>>>>>> origin/dev
    }

    /**
     * Affiche les détails d'un paramètre.
     */
    public function read($id)
    {
<<<<<<< HEAD
        $parametre = Parametre::findOrFail($id);
        return view('parametres.consulter_parametres', compact('parametre'));
=======
        try {
            $parametre = $this->parametreService->find($id);
            if ($parametre === null) {
                $this->logInterface->save([
                    'modele' => 'PARAMETRE',
                    'action' => 'Tentative de Consultation de Paramètre',
                    'statut' => 'ECHEC',
                    'message' => 'Paramètre introuvable pour ID: ' . $id,
                    'ip_address' => request()->ip(),
                ]);
                return redirect()->route('parametre.All')->withErrors(['error' => 'Paramètre introuvable.']);
            } else {
                $this->logInterface->save([
                    'modele' => 'PARAMETRE',
                    'action' => 'Consultation de Paramètre',
                    'statut' => 'SUCCES',
                    'message' => 'Paramètre consulté avec succès, ID: ' . $id,
                    'ip_address' => request()->ip(),
                ]);
                return view('parametres.consulter_parametres', compact('parametre'));
            }
        } catch (Exception $e) {
            $this->logInterface->save([
                'modele' => 'PARAMETRE',
                'action' => 'Tentative de Consultation de Paramètre',
                'statut' => 'ECHEC',
                'message' => $e->getMessage(),
                'ip_address' => request()->ip(),
            ]);
            return redirect()->route('parametre.All')->withErrors(['error' => 'Paramètre introuvable.']);
        }
>>>>>>> origin/dev
    }

    /**
     * Affiche le formulaire d'édition.
     */
    public function formModifier($id)
    {
<<<<<<< HEAD
        $parametre = Parametre::findOrFail($id);
        return view('parametres.modifier_parametres', compact('parametre'));
=======
        try {
            $parametre = $this->parametreService->find($id);
            $this->logInterface->save([
                'modele' => 'PARAMETRE',
                'action' => 'Redirection vers le formulaire de modification',
                'statut' => 'SUCCES',
                'message' => 'Affichage du formulaire de modification avec succès, ID: ' . $id,
                'ip_address' => request()->ip(),
            ]);
            return view('parametres.modifier_parametres', compact('parametre'));
        } catch (Exception $e) {
            $this->logInterface->save([
                'modele' => 'PARAMETRE',
                'action' => 'Tentative de redirection vers le formulaire de modification',
                'statut' => 'ECHEC',
                'message' => $e->getMessage(),
                'ip_address' => request()->ip(),
            ]);
            return redirect()->route('parametre.All')->withErrors(['error' => 'Impossible de charger le formulaire de modification.']);
        }
>>>>>>> origin/dev
    }

    /**
     * Met à jour le paramètre.
     */
    public function update(Request $request, $id)
    {
<<<<<<< HEAD
        $this->parametreService->update($request, $id);
        return redirect()->route('parametre.All');
=======
        try {
            $parametre = $this->parametreService->update($request, $id);
            if ($parametre === null) {
                $this->logInterface->save([
                    'modele' => 'PARAMETRE',
                    'action' => 'Tentative de Modification de Paramètre',
                    'statut' => 'ECHEC',
                    'message' => 'Une erreur est survenue lors de la modification du paramètre',
                    'ip_address' => request()->ip(),
                ]);
                return redirect()->back()->withInput()->withErrors(['error' => 'Erreur lors de la mise à jour du paramètre.']);
            } else {
                $this->logInterface->save([
                    'modele' => 'PARAMETRE',
                    'action' => 'Modification de Paramètre',
                    'statut' => 'SUCCES',
                    'message' => 'Paramètre modifié avec succès, ID: ' . $id,
                    'ip_address' => request()->ip(),
                ]);
                return redirect()->route('parametre.All');
            }
        } catch (Exception $e) {
            $this->logInterface->save([
                'modele' => 'PARAMETRE',
                'action' => 'Tentative de Modification de Paramètre',
                'statut' => 'ECHEC',
                'message' => $e->getMessage(),
                'ip_address' => request()->ip(),
            ]);
            return redirect()->back()->withInput()->withErrors(['error' => 'Erreur lors de la mise à jour du paramètre.']);
        }
>>>>>>> origin/dev
    }

    /**
     * Supprime le paramètre (affiche la confirmation).
     */
    public function delete($id)
    {
<<<<<<< HEAD
        $parametre = Parametre::findOrFail($id);
        return view('parametres.supprimer_parametres', compact('parametre'));
=======
        try {
            $parametre = $this->parametreService->find($id);
            $this->logInterface->save([
                'modele' => 'PARAMETRE',
                'action' => 'Affichage du formulaire de confirmation de suppression',
                'statut' => 'SUCCES',
                'message' => 'Formulaire de confirmation affiché avec succès pour ID: ' . $id,
                'ip_address' => request()->ip(),
            ]);
            return view('parametres.supprimer_parametres', compact('parametre'));
        } catch (Exception $e) {
            $this->logInterface->save([
                'modele' => 'PARAMETRE',
                'action' => 'Tentative d\'affichage du formulaire de confirmation de suppression',
                'statut' => 'ECHEC',
                'message' => $e->getMessage(),
                'ip_address' => request()->ip(),
            ]);
            return redirect()->route('parametre.All')->withErrors(['error' => 'Erreur lors de la tentative de suppression.']);
        }
>>>>>>> origin/dev
    }

    /**
     * Supprime définitivement le paramètre.
     */
    public function destroy($id)
    {
<<<<<<< HEAD
        $parametre = Parametre::findOrFail($id);
        $parametre->delete();
        return redirect()->route('parametre.All');
    }
}

=======
        try {
            $result = $this->parametreService->delete($id);
            if ($result === false) {
                $this->logInterface->save([
                    'modele' => 'PARAMETRE',
                    'action' => 'Tentative de Suppression Définitive de Paramètre',
                    'statut' => 'ECHEC',
                    'message' => 'Une erreur est survenue lors de la suppression',
                    'ip_address' => request()->ip(),
                ]);
                return redirect()->route('parametre.All')->withErrors(['error' => 'Erreur lors de la suppression du paramètre.']);
            } else {
                $this->logInterface->save([
                    'modele' => 'PARAMETRE',
                    'action' => 'Suppression Définitive de Paramètre',
                    'statut' => 'SUCCES',
                    'message' => 'Paramètre supprimé avec succès, ID: ' . $id,
                    'ip_address' => request()->ip(),
                ]);
                return redirect()->route('parametre.All');
            }
        } catch (Exception $e) {
            $this->logInterface->save([
                'modele' => 'PARAMETRE',
                'action' => 'Tentative de Suppression Définitive de Paramètre',
                'statut' => 'ECHEC',
                'message' => $e->getMessage(),
                'ip_address' => request()->ip(),
            ]);
            return redirect()->route('parametre.All')->withErrors(['error' => 'Erreur lors de la suppression du paramètre.']);
        }
    }
}
>>>>>>> origin/dev
