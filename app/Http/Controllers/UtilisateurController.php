<?php

namespace App\Http\Controllers;

use App\Interfaces\LogInterface;
use App\Models\Utilisateur;
<<<<<<< HEAD
use App\Services\UtilisateurService;
=======
use App\Interfaces\UtilisateurInterface;
>>>>>>> origin/dev
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;


class UtilisateurController extends Controller
{
<<<<<<< HEAD
    protected UtilisateurService $utilisateurService;

    public function __construct(UtilisateurIm $utilisateurService) {
        $this->utilisateurService = $utilisateurService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->utilisateurService->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->utilisateurService->create();
    }

    /**
=======
    protected UtilisateurInterface $utilisateurInterface;
    protected LogInterface $logInterface;

    public function __construct(UtilisateurInterface $utilisateurInterface , LogInterface $logInterface) {
        $this->utilisateurInterface = $utilisateurInterface;
        $this->logInterface = $logInterface;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $utilisateurs = $this->utilisateurInterface->index();
            if($utilisateurs === null){
                $this->logInterface->save([
                    'modele' => 'UTILISATEUR',
                    'action' => 'Tentative de Lister Tous les Utilisateurs',
                    'statut' => 'ECHEC',
                    'message' => 'Une Erreur est survenue',
                    'ip_address' => request()->ip(),
                ]);
            }else{
                $this->logInterface->save([
                    'modele' => 'UTILISATEUR',
                    'action' => 'Lister Tous les Utilisateurs',
                    'statut' => 'SUCCES',
                    'message' => 'Tous les utilisateurs ont ete affcihé avec succes',
                    'ip_address' => request()->ip(),
                ]);
                return view('utilisateur.index', compact('utilisateurs'));
            }
        } catch (Exception $e) {
            $this->logInterface->save([
                    'modele' => 'UTILISATEUR',
                    'action' => 'Tentative de Lister Tous les Utilisateurs',
                    'statut' => 'ECHEC',
                    'message' => 'Une Erreur est survenue:'.$e->getMessage(),
                    'ip_address' => request()->ip(),
                ]);
            return redirect()->route('utilisateur.index')->with('error', 'Erreur lors de la récupération des utilisateurs: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            $this->logInterface->save([
                    'modele' => 'Utilisateur',
                    'action' => 'Redirection vers le formulaire d\'ajout',
                    'statut' => 'SUCCES',
                    'message' => 'Affichage du formulaire avec ducces',
                    'ip_address' => request()->ip(),
                ]);

            return $this->utilisateurInterface->create();
        } catch (Exception $e) {
            $this->logInterface->save([
                    'modele' => 'Utilisateur',
                    'action' => 'Tentative d\'affichage du formulaire d\'ajout',
                    'statut' => 'ECHEC',
                    'message' => 'Une Erreur est survenue:'.$e->getMessage(),
                    'ip_address' => request()->ip(),
                ]);
            return redirect()->route('utilisateur.index')->with('error', 'Erreur lors de l\'affichage du formulaire: ' . $e->getMessage());
        }
    }

    /**
>>>>>>> origin/dev
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
<<<<<<< HEAD
        $utilisateur = $this->utilisateurService->store($request);
        try {
            if ($utilisateur === null) {
                return redirect()->route('utilisateur.index')->with('error', 'Erreur lors de la création de l\'utilisateur');
            }else{
                return redirect()->route('utilisateur.index')->with('success', 'Utilisateur créé avec succès');
            }
        } catch (Exception $e) {
=======
        try {
            $utilisateur = $this->utilisateurInterface->store($request);
            if ($utilisateur === null) {
                $this->logInterface->save([
                    'modele' => 'UTILISATEUR',
                    'action' => 'Tentative d\'Ajout d\'un Utilisateur',
                    'statut' => 'ECHEC',
                    'message' => 'Une Erreur est survenue lors de l\'ajout d\'un utilisateur',
                    'ip_address' => request()->ip(),
                ]);
                return redirect()->route('utilisateur.index')->with('error', 'Erreur lors de la création de l\'utilisateur');
            }else{
                $this->logInterface->save([
                    'modele' => 'UTILISATEUR',
                    'action' => 'Ajout d\'un Utilisateur',
                    'statut' => 'SUCCES',
                    'message' => 'Utilisateur ajoute avec succes, id:'.$utilisateur->id,
                    'ip_address' => request()->ip(),
                ]);
                return redirect()->route('utilisateur.index')->with('success', 'Utilisateur créé avec succès');
            }
        } catch (Exception $e) {
            $this->logInterface->save([
                    'modele' => 'UTILISATEUR',
                    'action' => 'Tentative d\'Ajout d\'un Utilisateur',
                    'statut' => 'ECHEC',
                    'message' => 'Une Erreur est survenue lors de l\'ajout d\'un utilisateur:'.$e->getMessage(),
                    'ip_address' => request()->ip(),
                ]);
>>>>>>> origin/dev
            return redirect()->route('utilisateur.index')->with('error', 'Erreur lors de la création de l\'utilisateur: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        
    }
<<<<<<< HEAD

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Utilisateur $utilisateur)
    {
        return $this->utilisateurService->edit($utilisateur);
    }

    /**
=======

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Utilisateur $utilisateur)
    {
        try {
            $this->logInterface->save([
                    'modele' => 'UTILISATEUR',
                    'action' => 'Tentative d\'affichage du formulaire de modification',
                    'statut' => 'SUCCES',
                    'message' => 'Affichage du formulaire de modification avec succes',
                    'ip_address' => request()->ip(),
                ]);
            return $this->utilisateurInterface->edit($utilisateur);
        } catch (Exception $e) {
            $this->logInterface->save([
                    'modele' => 'UTILISATEUR',
                    'action' => 'Tentative d\'affichage du formulaire de modification',
                    'statut' => 'ECHEC',
                    'message' => 'Une Erreur est survenue lors de l\'affichage du formulaire de modification:'.$e->getMessage(),
                    'ip_address' => request()->ip(),
                ]);
            return redirect()->route('utilisateur.index')->with('error', 'Erreur lors de l\'affichage du formulaire: ' . $e->getMessage());
        }
    }

    /**
>>>>>>> origin/dev
     * Update the specified resource in storage.
     */
    public function update(Request $request, Utilisateur $utilisateur)
    {
<<<<<<< HEAD
        return $this->utilisateurService->update($request, $utilisateur);
=======
        try {
            $result = $this->utilisateurInterface->update($request, $utilisateur);
            if($result === false){
                $this->logInterface->save([
                    'modele' => 'UTILISATEUR',
                    'action' => 'Tentative de modification d\'un Utilisateur',
                    'statut' => 'ECHEC',
                    'message' => 'Une Erreur est survenue lors de la modification d\'un utilisateur',
                    'ip_address' => request()->ip(),
                ]);
                return redirect()->route('utilisateur.index')->with('error', 'Erreur lors de la modification de l\'utilisateur');
            }else{
                $this->logInterface->save([
                    'modele' => 'UTILISATEUR',
                    'action' => 'Modification d\'un Utilisateur',
                    'statut' => 'SUCCES',
                    'message' => 'Utilisateur modifié avec succes, id:'.$utilisateur->id,
                    'ip_address' => request()->ip(),
                ]);
                return redirect()->route('utilisateur.index')->with('success', 'Utilisateur modifié avec succès');
            }
        } catch (Exception $e) {
            $this->logInterface->save([
                    'modele' => 'UTILISATEUR',
                    'action' => 'Tentative de modification d\'un Utilisateur',
                    'statut' => 'ECHEC',
                    'message' => 'Une Erreur est survenue lors de la modification d\'un utilisateur:'.$e->getMessage(),
                    'ip_address' => request()->ip(),
                ]);
            return redirect()->route('utilisateur.index')->with('error', 'Erreur lors de la modification de l\'utilisateur: ' . $e->getMessage());
        }
>>>>>>> origin/dev
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Utilisateur $utilisateur)
    {
<<<<<<< HEAD
        return $this->utilisateurService->destroy($utilisateur);
=======
        try {
            $result = $this->utilisateurInterface->destroy($utilisateur);
            if($result === false){
                $this->logInterface->save([
                    'modele' => 'UTILISATEUR',
                    'action' => 'Tentative de suppression d\'un Utilisateur',
                    'statut' => 'ECHEC',
                    'message' => 'Une Erreur est survenue lors de la suppression d\'un utilisateur',
                    'ip_address' => request()->ip(),
                ]);
                return redirect()->route('utilisateur.index')->with('error', 'Erreur lors de la suppression de l\'utilisateur');
            }else{
                $this->logInterface->save([
                    'modele' => 'UTILISATEUR',
                    'action' => 'Suppression d\'un Utilisateur',
                    'statut' => 'SUCCES',
                    'message' => 'Utilisateur supprimé avec succes, id:'.$utilisateur->id,
                    'ip_address' => request()->ip(),
                ]);
                return redirect()->route('utilisateur.index')->with('success', 'Utilisateur supprimé avec succès');
            }
        } catch (Exception $e) {
            $this->logInterface->save([
                    'modele' => 'UTILISATEUR',
                    'action' => 'Tentative de suppression d\'un Utilisateur',
                    'statut' => 'ECHEC',
                    'message' => 'Une Erreur est survenue lors de la suppression d\'un utilisateur:'.$e->getMessage(),
                    'ip_address' => request()->ip(),
                ]);
            return redirect()->route('utilisateur.index')->with('error', 'Erreur lors de la suppression de l\'utilisateur: ' . $e->getMessage());
        }
    }
    /**
     * Activer ou désactiver l'utilisateur.
     */
    public function toggleStatus(Utilisateur $utilisateur)
    {
        try {
            $result = $utilisateur->update(['is_active' => !$utilisateur->is_active]);
            $nouveauStatut = $utilisateur->is_active ? 'activé' : 'désactivé';
            
            $this->logInterface->save([
                'modele' => 'UTILISATEUR',
                'action' => 'Modification statut d\'un Utilisateur',
                'statut' => 'SUCCES',
                'message' => 'Statut '.$nouveauStatut.' avec succes, id:'.$utilisateur->id,
                'ip_address' => request()->ip(),
            ]);
            return back()->with('success', 'Le statut du compte a été mis à jour avec succès.');
        } catch (Exception $e) {
            $this->logInterface->save([
                'modele' => 'UTILISATEUR',
                'action' => 'Tentative modification statut Utilisateur',
                'statut' => 'ECHEC',
                'message' => 'Erreur: '.$e->getMessage(),
                'ip_address' => request()->ip(),
            ]);
            return back()->with('error', 'Erreur lors de la mise à jour du statut : ' . $e->getMessage());
        }
>>>>>>> origin/dev
    }
}
