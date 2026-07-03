<?php
namespace App\Implementations;

use App\Interfaces\UtilisateurInterface;
use App\Models\Utilisateur;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class UtilisateurImp implements UtilisateurInterface {

    public function index(): View {
        return view('utilisateur.index');
    }

    public function create(): View {
        return view('utilisateur.create');
    }

    public function store(Request $request): Utilisateur {
        return new Utilisateur();
    }

    public function edit(Utilisateur $utilisateur): View {
        return view('utilisateur.edit');
    }

    public function update(Request $request, Utilisateur $utilisateur): bool {
        return true;
    }

    public function destroy(Utilisateur $utilisateur): bool {
        return true;
    }
}