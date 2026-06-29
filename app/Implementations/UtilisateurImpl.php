<?php

namespace App\Implementations;

use App\Interfaces\UtilisateurInterface;
use App\Models\Utilisateur;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;




class UtilisateurImpl implements UtilisateurInterface{
    public function index(): View{
        $utilisateurs = Utilisateur::all();
        return view('utilisateur.index', compact('utilisateurs') );
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

        return Utilisateur::create($request->all());
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

        return $utilisateur->update($request->all());
        //return redirect()->route('utilisateur.index')->with('success', 'Utilisateur modifié avec succès');
    }

    public function destroy(Utilisateur $utilisateur): bool|null{
        return $utilisateur->delete();
        //return redirect()->route('utilisateur.index')->with('success', 'Utilisateur supprimé avec succès');
    }
}

