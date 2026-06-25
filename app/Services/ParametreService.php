<?php

namespace App\Services;

use App\Models\Parametre;
use Illuminate\Http\Request;

class ParametreService
{
    /**
     * Valide et crée un paramètre.
     */
    public function create(Request $request): Parametre
    {
        $request->validate([
            'code' => 'required',
            'libelle' => 'required',
        ]);

        return Parametre::create($request->all());
    }

    /**
     * Valide et met à jour un paramètre existant.
     */
    public function update(Request $request, $id): Parametre
    {
        $request->validate([
            'code' => 'required',
            'libelle' => 'required',
        ]);

        $parametre = Parametre::findOrFail($id);
        $parametre->update($request->all());

        return $parametre;
    }
}
