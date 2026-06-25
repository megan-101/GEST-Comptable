<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use App\Services\UtilisateurService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;


class UtilisateurController extends Controller
{
    protected UtilisateurService $utilisateurService;

    public function __construct(UtilisateurService $utilisateurService) {
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
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $utilisateur = $this->utilisateurService->store($request);
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
        return $this->utilisateurService->edit($utilisateur);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Utilisateur $utilisateur)
    {
        return $this->utilisateurService->update($request, $utilisateur);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Utilisateur $utilisateur)
    {
        return $this->utilisateurService->destroy($utilisateur);
    }
}
