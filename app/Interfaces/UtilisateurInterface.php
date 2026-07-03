<?php

namespace App\Interfaces;

use App\Models\Utilisateur;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

interface UtilisateurInterface
{
    /**
     * Les interfaces ne contiennent que les définitions des fonctions.
     * Nom de la fonction, type de retour et ses arguments.
     * Aucune logique métier n'est implémentée dans les interfaces.
     */

    public function index(): Collection;

    public function create(): View;

    public function store(Request $request): Utilisateur;

    public function edit(Utilisateur $utilisateur): View;

    public function update(Request $request, Utilisateur $utilisateur): bool;

    public function destroy(Utilisateur $utilisateur): bool;
}