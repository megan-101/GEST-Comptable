<?php

namespace App\Http\Controllers;

use App\Models\Compte;
use App\Interfaces\CompteInterface;
use App\Interfaces\LogInterface;
use Illuminate\Http\Request;
use Exception;

class CompteController extends Controller
{
    protected CompteInterface $compteInterface;
    protected LogInterface $logInterface;

    public function __construct(CompteInterface $compteInterface, LogInterface $logInterface)
    {
        $this->compteInterface = $compteInterface;
        $this->logInterface = $logInterface;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $this->logInterface->save([
                'modele'     => 'COMPTE',
                'action'     => 'Lister Tous les Comptes',
                'statut'     => 'SUCCES',
                'message'    => 'Affichage de la liste des comptes',
                'ip_address' => request()->ip(),
            ]);
            return $this->compteInterface->index();
        } catch (Exception $e) {
            $this->logInterface->save([
                'modele'     => 'COMPTE',
                'action'     => 'Lister Tous les Comptes',
                'statut'     => 'ECHEC',
                'message'    => $e->getMessage(),
                'ip_address' => request()->ip(),
            ]);
            abort(500, 'Erreur lors de la récupération des comptes: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            $this->logInterface->save([
                'modele'     => 'COMPTE',
                'action'     => 'Afficher Formulaire Création',
                'statut'     => 'SUCCES',
                'message'    => 'Affichage du formulaire de création de compte',
                'ip_address' => request()->ip(),
            ]);
            return $this->compteInterface->create();
        } catch (Exception $e) {
            $this->logInterface->save([
                'modele'     => 'COMPTE',
                'action'     => 'Afficher Formulaire Création',
                'statut'     => 'ECHEC',
                'message'    => $e->getMessage(),
                'ip_address' => request()->ip(),
            ]);
            return redirect()->route('compte.index')->with('error', 'Erreur lors de l\'affichage du formulaire: ' . $e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $result = $this->compteInterface->store($request);

            if ($result) {
                $this->logInterface->save([
                    'modele'     => 'COMPTE',
                    'action'     => 'Créer Compte',
                    'statut'     => 'SUCCES',
                    'message'    => 'Nouveau compte créé avec succès',
                    'ip_address' => request()->ip(),
                ]);
                return redirect()->route('compte.index')->with('success', 'Compte créé avec succès');
            } else {
                $this->logInterface->save([
                    'modele'     => 'COMPTE',
                    'action'     => 'Créer Compte',
                    'statut'     => 'ECHEC',
                    'message'    => 'Échec de la création du compte',
                    'ip_address' => request()->ip(),
                ]);
                return redirect()->route('compte.index')->with('error', 'Erreur lors de la création du compte');
            }
        } catch (Exception $e) {
            $this->logInterface->save([
                'modele'     => 'COMPTE',
                'action'     => 'Créer Compte',
                'statut'     => 'ECHEC',
                'message'    => $e->getMessage(),
                'ip_address' => request()->ip(),
            ]);
            return redirect()->route('compte.index')->with('error', 'Erreur lors de la création du compte: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Compte $compte)
    {
        try {
            $this->logInterface->save([
                'modele'     => 'COMPTE',
                'action'     => 'Afficher Compte',
                'statut'     => 'SUCCES',
                'message'    => "Affichage du compte ID {$compte->id}",
                'ip_address' => request()->ip(),
            ]);
            return $this->compteInterface->show($compte);
        } catch (Exception $e) {
            $this->logInterface->save([
                'modele'     => 'COMPTE',
                'action'     => 'Afficher Compte',
                'statut'     => 'ECHEC',
                'message'    => $e->getMessage(),
                'ip_address' => request()->ip(),
            ]);
            return redirect()->route('compte.index')->with('error', 'Erreur lors de la consultation du compte: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Compte $compte)
    {
        try {
            $this->logInterface->save([
                'modele'     => 'COMPTE',
                'action'     => 'Afficher Formulaire Modification',
                'statut'     => 'SUCCES',
                'message'    => "Formulaire de modification pour le compte ID {$compte->id}",
                'ip_address' => request()->ip(),
            ]);
            return $this->compteInterface->edit($compte);
        } catch (Exception $e) {
            $this->logInterface->save([
                'modele'     => 'COMPTE',
                'action'     => 'Afficher Formulaire Modification',
                'statut'     => 'ECHEC',
                'message'    => $e->getMessage(),
                'ip_address' => request()->ip(),
            ]);
            return redirect()->route('compte.index')->with('error', 'Erreur lors de l\'affichage du formulaire: ' . $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Compte $compte)
    {
        try {
            $result = $this->compteInterface->update($request, $compte);

            if ($result) {
                $this->logInterface->save([
                    'modele'     => 'COMPTE',
                    'action'     => 'Modifier Compte',
                    'statut'     => 'SUCCES',
                    'message'    => "Compte ID {$compte->id} modifié",
                    'ip_address' => request()->ip(),
                ]);
                return redirect()->route('compte.index')->with('success', 'Compte modifié avec succès');
            } else {
                $this->logInterface->save([
                    'modele'     => 'COMPTE',
                    'action'     => 'Modifier Compte',
                    'statut'     => 'ECHEC',
                    'message'    => 'Échec de la mise à jour du compte',
                    'ip_address' => request()->ip(),
                ]);
                return redirect()->route('compte.index')->with('error', 'Erreur lors de la modification du compte');
            }
        } catch (Exception $e) {
            $this->logInterface->save([
                'modele'     => 'COMPTE',
                'action'     => 'Modifier Compte',
                'statut'     => 'ECHEC',
                'message'    => $e->getMessage(),
                'ip_address' => request()->ip(),
            ]);
            return redirect()->route('compte.index')->with('error', 'Erreur lors de la modification du compte: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Compte $compte)
    {
        try {
            $id = $compte->id;
            $result = $this->compteInterface->destroy($compte);

            if ($result) {
                $this->logInterface->save([
                    'modele'     => 'COMPTE',
                    'action'     => 'Supprimer Compte',
                    'statut'     => 'SUCCES',
                    'message'    => "Compte ID {$id} supprimé",
                    'ip_address' => request()->ip(),
                ]);
                return redirect()->route('compte.index')->with('success', 'Compte supprimé avec succès');
            } else {
                $this->logInterface->save([
                    'modele'     => 'COMPTE',
                    'action'     => 'Supprimer Compte',
                    'statut'     => 'ECHEC',
                    'message'    => 'Échec de la suppression du compte',
                    'ip_address' => request()->ip(),
                ]);
                return redirect()->route('compte.index')->with('error', 'Erreur lors de la suppression du compte');
            }
        } catch (Exception $e) {
            $this->logInterface->save([
                'modele'     => 'COMPTE',
                'action'     => 'Supprimer Compte',
                'statut'     => 'ECHEC',
                'message'    => $e->getMessage(),
                'ip_address' => request()->ip(),
            ]);
            return redirect()->route('compte.index')->with('error', 'Erreur lors de la suppression du compte: ' . $e->getMessage());
        }
    }
}
