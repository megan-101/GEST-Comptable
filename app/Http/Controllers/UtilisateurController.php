<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use App\Interfaces\UtilisateurInterface;
use App\Interfaces\LogInterface;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;


class UtilisateurController extends Controller
{
    protected UtilisateurInterface $utilisateurInterface;
    protected LogInterface $logInterface;

    public function __construct(UtilisateurInterface $utilisateurInterface, LogInterface $logInterface) {
        $this->utilisateurInterface = $utilisateurInterface;
        $this->logInterface = $logInterface;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $this->logInterface->save([
                'modele' => 'UTILISATEUR',
                'action' => 'Lister Tous les Utilisateurs',
                'statut' => 'SUCCES',
                'message' => 'Affichage de la liste des utilisateurs',
                'ip_address' => request()->ip(),
            ]);
            return $this->utilisateurInterface->index();
        } catch (Exception $e) {
            $this->logInterface->save([
                'modele' => 'UTILISATEUR',
                'action' => 'Lister Tous les Utilisateurs',
                'statut' => 'ECHEC',
                'message' => $e->getMessage(),
                'ip_address' => request()->ip(),
            ]);
            abort(500, 'Erreur lors de la récupération des utilisateurs: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            $this->logInterface->save([
                'modele' => 'UTILISATEUR',
                'action' => 'Affichage Formulaire Création',
                'statut' => 'SUCCES',
                'message' => 'Formulaire de création affiché',
                'ip_address' => request()->ip(),
            ]);
            return $this->utilisateurInterface->create();
        } catch (Exception $e) {
            $this->logInterface->save([
                'modele' => 'UTILISATEUR',
                'action' => 'Affichage Formulaire Création',
                'statut' => 'ECHEC',
                'message' => $e->getMessage(),
                'ip_address' => request()->ip(),
            ]);
            return redirect()->route('utilisateur.index')->with('error', 'Erreur lors de l\'affichage du formulaire: ' . $e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $utilisateur = $this->utilisateurInterface->store($request);
        try {
            if ($utilisateur === null) {
                $this->logInterface->save([
                    'modele' => 'UTILISATEUR',
                    'action' => 'Création Utilisateur',
                    'statut' => 'ECHEC',
                    'message' => 'Création échouée',
                    'ip_address' => request()->ip(),
                ]);
                return redirect()->route('utilisateur.index')->with('error', 'Erreur lors de la création de l\'utilisateur');
            }else{
                $this->logInterface->save([
                    'modele' => 'UTILISATEUR',
                    'action' => 'Création Utilisateur',
                    'statut' => 'SUCCES',
                    'message' => 'Utilisateur créé avec succès',
                    'ip_address' => request()->ip(),
                ]);
                return redirect()->route('utilisateur.index')->with('success', 'Utilisateur créé avec succès');
            }
        } catch (Exception $e) {
            $this->logInterface->save([
                'modele' => 'UTILISATEUR',
                'action' => 'Création Utilisateur',
                'statut' => 'ECHEC',
                'message' => $e->getMessage(),
                'ip_address' => request()->ip(),
            ]);
            return redirect()->route('utilisateur.index')->with('error', 'Erreur lors de la création de l\'utilisateur: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Utilisateur $utilisateur)
    {
        try {
            $this->logInterface->save([
                'modele' => 'UTILISATEUR',
                'action' => 'Affichage Formulaire Modification',
                'statut' => 'SUCCES',
                'message' => "Formulaire de modification pour l'utilisateur {$utilisateur->nom}",
                'ip_address' => request()->ip(),
            ]);
            return $this->utilisateurInterface->edit($utilisateur);
        } catch (Exception $e) {
            $this->logInterface->save([
                'modele' => 'UTILISATEUR',
                'action' => 'Affichage Formulaire Modification',
                'statut' => 'ECHEC',
                'message' => $e->getMessage(),
                'ip_address' => request()->ip(),
            ]);
            return redirect()->route('utilisateur.index')->with('error', 'Erreur lors de l\'affichage du formulaire: ' . $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Utilisateur $utilisateur)
    {
        $result = $this->utilisateurInterface->update($request, $utilisateur);

        try {
            if($result === false){
                $this->logInterface->save([
                    'modele' => 'UTILISATEUR',
                    'action' => 'Modification Utilisateur',
                    'statut' => 'ECHEC',
                    'message' => 'Modification échouée',
                    'ip_address' => request()->ip(),
                ]);
                return redirect()->route('utilisateur.index')->with('error', 'Erreur lors de la modification de l\'utilisateur');
            }else{
                $this->logInterface->save([
                    'modele' => 'UTILISATEUR',
                    'action' => 'Modification Utilisateur',
                    'statut' => 'SUCCES',
                    'message' => "Utilisateur {$utilisateur->nom} modifié",
                    'ip_address' => request()->ip(),
                ]);
                return redirect()->route('utilisateur.index')->with('success', 'Utilisateur modifié avec succès');
            }
        } catch (Exception $e) {
            $this->logInterface->save([
                'modele' => 'UTILISATEUR',
                'action' => 'Modification Utilisateur',
                'statut' => 'ECHEC',
                'message' => $e->getMessage(),
                'ip_address' => request()->ip(),
            ]);
            return redirect()->route('utilisateur.index')->with('error', 'Erreur lors de la modification de l\'utilisateur: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Utilisateur $utilisateur)
    {
        $result = $this->utilisateurInterface->destroy($utilisateur);

        try {
            if($result === false){
                $this->logInterface->save([
                    'modele' => 'UTILISATEUR',
                    'action' => 'Suppression Utilisateur',
                    'statut' => 'ECHEC',
                    'message' => 'Suppression échouée',
                    'ip_address' => request()->ip(),
                ]);
                return redirect()->route('utilisateur.index')->with('error', 'Erreur lors de la suppression de l\'utilisateur');
            }else{
                $this->logInterface->save([
                    'modele' => 'UTILISATEUR',
                    'action' => 'Suppression Utilisateur',
                    'statut' => 'SUCCES',
                    'message' => "Utilisateur {$utilisateur->nom} supprimé",
                    'ip_address' => request()->ip(),
                ]);
                return redirect()->route('utilisateur.index')->with('success', 'Utilisateur supprimé avec succès');
            }
        } catch (Exception $e) {
            $this->logInterface->save([
                'modele' => 'UTILISATEUR',
                'action' => 'Suppression Utilisateur',
                'statut' => 'ECHEC',
                'message' => $e->getMessage(),
                'ip_address' => request()->ip(),
            ]);
            return redirect()->route('utilisateur.index')->with('error', 'Erreur lors de la suppression de l\'utilisateur: ' . $e->getMessage());
        }
    }
}
