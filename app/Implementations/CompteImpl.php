<?php

namespace App\Implementations;

use App\Interfaces\CompteInterface;
use App\Models\Compte;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CompteImpl implements CompteInterface
{
    public function index(): View
    {
        $comptes = Compte::all();
        return view('compte.index', compact('comptes'));
    }

    public function create(): View
    {
        return view('compte.create');
    }

    public function store(Request $request): bool
    {
        $request->validate([
            'valeur'     => 'required|string|max:255',
            'flag_modif' => 'required|string|max:255',
        ]);

        $compte = Compte::create($request->only(['valeur', 'flag_modif']));

        return $compte->exists;
    }

    public function show(Compte $compte): View
    {
        return view('compte.show', compact('compte'));
    }

    public function edit(Compte $compte): View
    {
        return view('compte.edit', compact('compte'));
    }

    public function update(Request $request, Compte $compte): bool
    {
        $request->validate([
            'valeur'     => 'required|string|max:255',
            'flag_modif' => 'required|string|max:255',
        ]);

        return $compte->update($request->only(['valeur', 'flag_modif']));
    }

    public function destroy(Compte $compte): bool
    {
        return $compte->delete();
    }
}
