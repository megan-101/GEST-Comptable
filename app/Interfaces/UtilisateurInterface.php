<?php

namespace App\Interfaces;

use App\Models\Utilisateur;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;


interface UtilisateurInterface{

    // les interfaces ne contiennent que les def des fonctions donc le nom son type et ses arguments et n'a acune logique d'implementation

    public function index(): View;

    public function create(): View;

    public function store(Request $request): Utilisateur;

    public function edit(Utilisateur $utilisateur): View;

    public function update(Request $request, Utilisateur $utilisateur): bool;

    public function destroy(Utilisateur $utilisateur): bool|null;
    
}