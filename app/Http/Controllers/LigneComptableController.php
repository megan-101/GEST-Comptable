<?php

namespace App\Http\Controllers;

use App\Interfaces\LigneComptableInterface;
use App\Interfaces\LogInterface;
use Exception;
use Illuminate\Http\Request;

class LigneComptableController extends Controller
{
    protected $ligneComptableService;
    protected $logInterface;

    public function __construct(LigneComptableInterface $ligneComptableService, LogInterface $logInterface)
    {
        $this->ligneComptableService = $ligneComptableService;
        $this->logInterface = $logInterface;
    }

    /**
     * Display a listing of accounting lines.
     */
    public function index()
    {
        try {
            $listeLignes = $this->ligneComptableService->all();
            
            $this->logInterface->save([
                'modele' => 'LIGNE_COMPTABLE',
                'action' => 'Lister Toutes les Lignes Comptables',
                'statut' => 'SUCCES',
                'message' => 'Toutes les lignes comptables ont été affichées avec succès. Nombre: ' . $listeLignes->count(),
                'ip_address' => request()->ip(),
            ]);

            return view('ligne_comptables.index', compact('listeLignes'));
        } catch (Exception $e) {
            $this->logInterface->save([
                'modele' => 'LIGNE_COMPTABLE',
                'action' => 'Tentative de Lister les Lignes Comptables',
                'statut' => 'ECHEC',
                'message' => 'Erreur lors de la récupération des lignes: ' . $e->getMessage(),
                'ip_address' => request()->ip(),
            ]);

            return redirect()->back()->withErrors(['error' => 'Erreur lors de la récupération des lignes comptables.']);
        }
    }

    /**
     * Display details of a specific accounting line.
     */
    public function show($id)
    {
        try {
            $ligne = $this->ligneComptableService->find($id);

            $this->logInterface->save([
                'modele' => 'LIGNE_COMPTABLE',
                'action' => 'Consulter Ligne Comptable',
                'statut' => 'SUCCES',
                'message' => 'Ligne comptable consultée avec succès. ID: ' . $id,
                'ip_address' => request()->ip(),
            ]);

            return view('ligne_comptables.show', compact('ligne'));
        } catch (Exception $e) {
            $this->logInterface->save([
                'modele' => 'LIGNE_COMPTABLE',
                'action' => 'Tentative de Consultation de Ligne Comptable',
                'statut' => 'ECHEC',
                'message' => 'Erreur lors de la consultation de la ligne ' . $id . ': ' . $e->getMessage(),
                'ip_address' => request()->ip(),
            ]);

            return redirect()->route('lignecomptable.index')->withErrors(['error' => 'Ligne comptable introuvable.']);
        }
    }
}
