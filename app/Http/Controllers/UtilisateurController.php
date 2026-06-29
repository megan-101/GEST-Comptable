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
        return $this->utilisateurInterface->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->utilisateurInterface->create();
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
        return $this->utilisateurInterface->edit($utilisateur);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Utilisateur $utilisateur)
    {
        $result = $this->utilisateurInterface->update($request, $utilisateur);

        if($result){
            return redirect()->route('utilisateur.index')->with('success', 'Utilisateur modifié avec succès');
        }else{
            return redirect()->route('utilisateur.index')->with('error', 'Erreur lors de la modification de l\'utilisateur');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Utilisateur $utilisateur)
    {
        return $this->utilisateurInterface->destroy($utilisateur);
    }
}
