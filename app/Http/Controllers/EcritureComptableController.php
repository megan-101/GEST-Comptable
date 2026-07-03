<?php

namespace App\Http\Controllers;

use App\Models\EcritureComptable;
use App\Interfaces\EcritureComptableInterface;
use Illuminate\Http\Request;
use Exception;

class EcritureComptableController extends Controller
{
    protected EcritureComptableInterface $ecritureInterface;

    public function __construct(EcritureComptableInterface $ecritureInterface)
    {
        $this->ecritureInterface = $ecritureInterface;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            return $this->ecritureInterface->index();
        } catch (Exception $e) {
            abort(500, 'Erreur lors de la récupération des écritures comptables: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(EcritureComptable $ecritureComptable)
    {
        try {
            return $this->ecritureInterface->show($ecritureComptable);
        } catch (Exception $e) {
            return redirect()->route('ecriture.index')->with('error', 'Erreur lors de la consultation de l\'écriture: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EcritureComptable $ecritureComptable)
    {
        try {
            return $this->ecritureInterface->edit($ecritureComptable);
        } catch (Exception $e) {
            return redirect()->route('ecriture.index')->with('error', 'Erreur lors de l\'affichage du formulaire: ' . $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EcritureComptable $ecritureComptable)
    {
        try {
            $result = $this->ecritureInterface->update($request, $ecritureComptable);

            if ($result) {
                return redirect()->route('ecriture.index')->with('success', 'Écriture modifiée avec succès');
            } else {
                return redirect()->route('ecriture.index')->with('error', 'Erreur lors de la modification de l\'écriture');
            }
        } catch (Exception $e) {
            return redirect()->route('ecriture.index')->with('error', 'Erreur lors de la modification de l\'écriture: ' . $e->getMessage());
        }
    }
}
