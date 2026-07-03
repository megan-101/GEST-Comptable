<?php

namespace App\Http\Controllers;

use App\Models\EcritureComptable;
use App\Interfaces\EcritureComptableInterface;
use App\Interfaces\LogInterface;
use Illuminate\Http\Request;
use Exception;

class EcritureComptableController extends Controller
{
    protected EcritureComptableInterface $ecritureInterface;
protected LogInterface $logInterface;

    public function __construct(EcritureComptableInterface $ecritureInterface, LogInterface $logInterface)
    {
        $this->ecritureInterface = $ecritureInterface;
        $this->logInterface = $logInterface;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $this->logInterface->save([
                'modele' => 'ECRITURE_COMPTABLE',
                'action' => 'Lister Toutes les Écritures',
                'statut' => 'SUCCES',
                'message' => 'Affichage de la liste des écritures comptables',
                'ip_address' => request()->ip(),
            ]);
            return $this->ecritureInterface->index();
        } catch (Exception $e) {
            $this->logInterface->save([
                'modele' => 'ECRITURE_COMPTABLE',
                'action' => 'Lister Toutes les Écritures',
                'statut' => 'ECHEC',
                'message' => $e->getMessage(),
                'ip_address' => request()->ip(),
            ]);
            abort(500, 'Erreur lors de la récupération des écritures comptables: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(EcritureComptable $ecritureComptable)
    {
        try {
            $this->logInterface->save([
                'modele' => 'ECRITURE_COMPTABLE',
                'action' => 'Afficher Écriture',
                'statut' => 'SUCCES',
                'message' => "Affichage de l'écriture ID {$ecritureComptable->id}",
                'ip_address' => request()->ip(),
            ]);
            return $this->ecritureInterface->show($ecritureComptable);
        } catch (Exception $e) {
            $this->logInterface->save([
                'modele' => 'ECRITURE_COMPTABLE',
                'action' => 'Afficher Écriture',
                'statut' => 'ECHEC',
                'message' => $e->getMessage(),
                'ip_address' => request()->ip(),
            ]);
            return redirect()->route('ecriture.index')->with('error', 'Erreur lors de la consultation de l\'écriture: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EcritureComptable $ecritureComptable)
    {
        try {
            $this->logInterface->save([
                'modele' => 'ECRITURE_COMPTABLE',
                'action' => 'Afficher Formulaire Modification',
                'statut' => 'SUCCES',
                'message' => "Formulaire de modification pour l'écriture ID {$ecritureComptable->id}",
                'ip_address' => request()->ip(),
            ]);
            return $this->ecritureInterface->edit($ecritureComptable);
        } catch (Exception $e) {
            $this->logInterface->save([
                'modele' => 'ECRITURE_COMPTABLE',
                'action' => 'Afficher Formulaire Modification',
                'statut' => 'ECHEC',
                'message' => $e->getMessage(),
                'ip_address' => request()->ip(),
            ]);
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
                $this->logInterface->save([
                    'modele' => 'ECRITURE_COMPTABLE',
                    'action' => 'Modifier Écriture',
                    'statut' => 'SUCCES',
                    'message' => "Écriture ID {$ecritureComptable->id} modifiée",
                    'ip_address' => request()->ip(),
                ]);
                return redirect()->route('ecriture.index')->with('success', 'Écriture modifiée avec succès');
            } else {
                $this->logInterface->save([
                    'modele' => 'ECRITURE_COMPTABLE',
                    'action' => 'Modifier Écriture',
                    'statut' => 'ECHEC',
                    'message' => 'Échec de la mise à jour de l\'écriture',
                    'ip_address' => request()->ip(),
                ]);
                return redirect()->route('ecriture.index')->with('error', 'Erreur lors de la modification de l\'écriture');
            }
        } catch (Exception $e) {
            $this->logInterface->save([
                'modele' => 'ECRITURE_COMPTABLE',
                'action' => 'Modifier Écriture',
                'statut' => 'ECHEC',
                'message' => $e->getMessage(),
                'ip_address' => request()->ip(),
            ]);
            return redirect()->route('ecriture.index')->with('error', 'Erreur lors de la modification de l\'écriture: ' . $e->getMessage());
        }
    }
}
