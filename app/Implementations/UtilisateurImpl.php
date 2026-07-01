<?php

namespace App\Implementations;

use App\Events\UtilisateurEvent;
use App\Interfaces\UtilisateurInterface;
use App\Models\Utilisateur;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;




class UtilisateurImpl implements UtilisateurInterface{
    public function index(): Collection{
        $utilisateurs = Utilisateur::all();
        return $utilisateurs;
    }

    public function create(): View{
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
        return  $Utilisateur;
    }

    public function edit(Utilisateur $utilisateur): View{
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
        return $result;
    }

    public function destroy(Utilisateur $utilisateur): bool{
        $result = $utilisateur->delete();
        return $result;
        //return redirect()->route('utilisateur.index')->with('success', 'Utilisateur supprimé avec succès');
    }
}

