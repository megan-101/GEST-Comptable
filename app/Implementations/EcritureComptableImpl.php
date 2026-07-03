<?php

namespace App\Implementations;

use App\Interfaces\EcritureComptableInterface;
use App\Models\EcritureComptable;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class EcritureComptableImpl implements EcritureComptableInterface
{
    public function index(): View
    {
        $ecritures = EcritureComptable::all();
        return view('ecriture.index', compact('ecritures'));
    }

    public function show(EcritureComptable $ecritureComptable): View
    {
        return view('ecriture.show', compact('ecritureComptable'));
    }

    public function edit(EcritureComptable $ecritureComptable): View
    {
        return view('ecriture.edit', compact('ecritureComptable'));
    }

    public function update(Request $request, EcritureComptable $ecritureComptable): bool
    {
        $request->validate([
            'numero'       => 'required|max:255|unique:ecriture_comptables,numero,' . $ecritureComptable->id,
            'date'         => 'required|date',
            'operation_id' => 'required|integer',
            'devise'       => 'required|string|max:10',
        ]);

        return $ecritureComptable->update($request->all());
    }
}
