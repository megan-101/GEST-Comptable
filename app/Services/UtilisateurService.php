<?php

namespace App\Services;

use App\Models\Utilisateur;
use Illuminate\Http\Request;


class UtilisateurService {
    public function index(){
        $utilisateurs = Utilisateur::all();
        return view('utilisateur.index', compact('utilisateurs') );
    }

    public function create(){
        return view('utilisateur.create');
    }

    public function store(Request $request):Utilisateur{
        $request->validate([
            "matricule" => "required|unique:utilisateurs|max:255",
            "login" => "required|unique:utilisateurs|max:255",
            "nom" => "required|max:255",
            "mdp" => "required|max:255"
        ]);

        return Utilisateur::create($request->all());
    }

    public function edit(Utilisateur $utilisateur){
        return view('utilisateur.edit', compact('utilisateur'));
    }

    public function update(Request $request, Utilisateur $utilisateur){
        $request->validate([
            "matricule" => "required|unique:utilisateurs,matricule," . $utilisateur->id . "|max:255",
            "login" => "required|unique:utilisateurs,login," . $utilisateur->id . "|max:255",
            "nom" => "required|max:255",
            "mdp" => "required|max:255"
        ]);

        $utilisateur->update($request->all());
        return redirect()->route('utilisateur.index')->with('success', 'Utilisateur modifié avec succès');
    }

    public function destroy(Utilisateur $utilisateur){
        $utilisateur->delete();
        return redirect()->route('utilisateur.index')->with('success', 'Utilisateur supprimé avec succès');
    }
}

