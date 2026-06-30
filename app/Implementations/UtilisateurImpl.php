<?php

namespace App\Implementations;

use App\Events\UtilisateurEvent;
use App\Interfaces\UtilisateurInterface;
use App\Models\Utilisateur;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;




class UtilisateurImpl implements UtilisateurInterface{
    public function index(): View{
        $utilisateurs = Utilisateur::all();
        event(new UtilisateurEvent("Consultation de la liste des utilisateurs", "Le nombre d'utilisateurs retournés est : " . $utilisateurs->count()));
        return view('utilisateur.index', compact('utilisateurs') );
    }

    public function create(): View{
        event(new UtilisateurEvent("Ouverture du formulaire de création d'un utilisateur",""));
        return view('utilisateur.create');
    }

    public function store(Request $request): Utilisateur{

        $request->validate([
            "matricule" => "required|unique:utilisateurs|max:255",
            "login" => "required|unique:utilisateurs|max:255",
            "nom" => "required|max:255",
            "mdp" => "required|max:255"
        ]);


        $Utilisateur = Utilisateur::create($request->all());
        event(new UtilisateurEvent("Création d'un utilisateur", "L'utilisateur créé est : " . $Utilisateur->nom));

        return  $Utilisateur;
    }

    public function edit(Utilisateur $utilisateur): View{
        event(new UtilisateurEvent("Ouverture du formulaire de modification d'un utilisateur", "L'utilisateur à modifier est : " . $utilisateur->nom));
        return view('utilisateur.edit', compact('utilisateur'));
    }

    public function update(Request $request, Utilisateur $utilisateur): bool{
        $request->validate([
            "matricule" => "required|unique:utilisateurs,matricule," . $utilisateur->id . "|max:255",
            "login" => "required|unique:utilisateurs,login," . $utilisateur->id . "|max:255",
            "nom" => "required|max:255",
            "mdp" => "required|max:255"
        ]);

        $result = $utilisateur->update($request->all());
        event(new UtilisateurEvent("Modification d'un utilisateur", "L'utilisateur modifié est : " . $utilisateur->nom));
        return $result;
        //return redirect()->route('utilisateur.index')->with('success', 'Utilisateur modifié avec succès');
    }

    public function destroy(Utilisateur $utilisateur): bool{
        $result = $utilisateur->delete();
        event(new UtilisateurEvent("Suppression d'un utilisateur", "L'utilisateur supprimé est : " . $utilisateur->nom));
        return $result;
        //return redirect()->route('utilisateur.index')->with('success', 'Utilisateur supprimé avec succès');
    }
}

