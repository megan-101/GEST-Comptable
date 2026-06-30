<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use App\Interfaces\UtilisateurInterface;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;


class UtilisateurController extends Controller
{
    protected UtilisateurInterface $utilisateurInterface;

    public function __construct(UtilisateurInterface $utilisateurInterface) {
        $this->utilisateurInterface = $utilisateurInterface;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            return $this->utilisateurInterface->index();
        } catch (Exception $e) {
            abort(500, 'Erreur lors de la récupération des utilisateurs: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            return $this->utilisateurInterface->create();
        } catch (Exception $e) {
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
                return redirect()->route('utilisateur.index')->with('error', 'Erreur lors de la création de l\'utilisateur');
            }else{
                return redirect()->route('utilisateur.index')->with('success', 'Utilisateur créé avec succès');
            }
        } catch (Exception $e) {
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
            return $this->utilisateurInterface->edit($utilisateur);
        } catch (Exception $e) {
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
                return redirect()->route('utilisateur.index')->with('error', 'Erreur lors de la modification de l\'utilisateur');
            }else{
                return redirect()->route('utilisateur.index')->with('success', 'Utilisateur modifié avec succès');
            }
        } catch (Exception $e) {
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
                return redirect()->route('utilisateur.index')->with('error', 'Erreur lors de la suppression de l\'utilisateur');
            }else{
                return redirect()->route('utilisateur.index')->with('success', 'Utilisateur supprimé avec succès');
            }
        } catch (Exception $e) {
            return redirect()->route('utilisateur.index')->with('error', 'Erreur lors de la suppression de l\'utilisateur: ' . $e->getMessage());
        }
    }
}
