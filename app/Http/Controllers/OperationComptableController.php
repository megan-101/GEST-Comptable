<?php

namespace App\Http\Controllers;

use App\Interfaces\OperationComptableInterface;
use App\Interfaces\LogInterface;
use Illuminate\Http\Request;

class OperationComptableController extends Controller
{
    protected OperationComptableInterface $operationInterface;
    protected LogInterface $logInterface;

    public function __construct(
        OperationComptableInterface $operationInterface,
        LogInterface $logInterface
    ) {
        $this->operationInterface = $operationInterface;
        $this->logInterface       = $logInterface;
    }

    // ─── Liste ────────────────────────────────────────────────────────────
    public function all()
    {
        try {
            $response = $this->operationInterface->all();
            $this->logInterface->save([
                'modele'     => 'OPERATION_COMPTABLE',
                'action'     => 'Lister Toutes les Opérations',
                'statut'     => 'SUCCES',
                'message'    => 'Liste des opérations comptables affichée avec succès',
                'ip_address' => request()->ip(),
            ]);
            return $response;
        } catch (\Exception $e) {
            $this->logInterface->save([
                'modele'     => 'OPERATION_COMPTABLE',
                'action'     => 'Tentative de Lister les Opérations',
                'statut'     => 'ECHEC',
                'message'    => $e->getMessage(),
                'ip_address' => request()->ip(),
            ]);
            return redirect()->back()->with('error', 'Impossible de charger la liste des opérations.');
        }
    }

    // ─── Formulaire d'ajout ───────────────────────────────────────────────
    public function formAjout()
    {
        try {
            $this->logInterface->save([
                'modele'     => 'OPERATION_COMPTABLE',
                'action'     => 'Affichage Formulaire Ajout',
                'statut'     => 'SUCCES',
                'message'    => 'Formulaire d\'ajout affiché avec succès',
                'ip_address' => request()->ip(),
            ]);
            return $this->operationInterface->formAjout();
        } catch (\Exception $e) {
            $this->logInterface->save([
                'modele'     => 'OPERATION_COMPTABLE',
                'action'     => 'Tentative Affichage Formulaire Ajout',
                'statut'     => 'ECHEC',
                'message'    => $e->getMessage(),
                'ip_address' => request()->ip(),
            ]);
            return redirect()->back()->with('error', 'Impossible de charger le formulaire d\'ajout.');
        }
    }

    // ─── Création ─────────────────────────────────────────────────────────
    public function create(Request $request)
    {
        try {
            $response = $this->operationInterface->create($request);
            $this->logInterface->save([
                'modele'     => 'OPERATION_COMPTABLE',
                'action'     => 'Ajout Opération Comptable',
                'statut'     => 'SUCCES',
                'message'    => 'Opération comptable ajoutée avec succès',
                'ip_address' => request()->ip(),
            ]);
            return $response;
        } catch (\Exception $e) {
            $this->logInterface->save([
                'modele'     => 'OPERATION_COMPTABLE',
                'action'     => 'Tentative Ajout Opération',
                'statut'     => 'ECHEC',
                'message'    => $e->getMessage(),
                'ip_address' => request()->ip(),
            ]);
            return redirect()->back()->with('error', 'Erreur lors de la création de l\'opération.');
        }
    }

    // ─── Consulter ────────────────────────────────────────────────────────
    public function read($id)
    {
        try {
            $response = $this->operationInterface->read($id);
            $this->logInterface->save([
                'modele'     => 'OPERATION_COMPTABLE',
                'action'     => 'Consulter Opération',
                'statut'     => 'SUCCES',
                'message'    => 'Opération consultée avec succès, id: ' . $id,
                'ip_address' => request()->ip(),
            ]);
            return $response;
        } catch (\Exception $e) {
            $this->logInterface->save([
                'modele'     => 'OPERATION_COMPTABLE',
                'action'     => 'Tentative Consulter Opération',
                'statut'     => 'ECHEC',
                'message'    => $e->getMessage(),
                'ip_address' => request()->ip(),
            ]);
            return redirect()->back()->with('error', 'Opération introuvable.');
        }
    }

    // ─── Formulaire de modification ───────────────────────────────────────
    public function formUpdate($id)
    {
        try {
            $response = $this->operationInterface->formUpdate($id);
            $this->logInterface->save([
                'modele'     => 'OPERATION_COMPTABLE',
                'action'     => 'Affichage Formulaire Modification',
                'statut'     => 'SUCCES',
                'message'    => 'Formulaire de modification affiché, id: ' . $id,
                'ip_address' => request()->ip(),
            ]);
            return $response;
        } catch (\Exception $e) {
            $this->logInterface->save([
                'modele'     => 'OPERATION_COMPTABLE',
                'action'     => 'Tentative Affichage Formulaire Modification',
                'statut'     => 'ECHEC',
                'message'    => $e->getMessage(),
                'ip_address' => request()->ip(),
            ]);
            return redirect()->back()->with('error', 'Opération introuvable.');
        }
    }

    // ─── Mise à jour ──────────────────────────────────────────────────────
    public function update(Request $request, $id)
    {
        try {
            $response = $this->operationInterface->update($request, $id);
            $this->logInterface->save([
                'modele'     => 'OPERATION_COMPTABLE',
                'action'     => 'Modification Opération',
                'statut'     => 'SUCCES',
                'message'    => 'Opération modifiée avec succès, id: ' . $id,
                'ip_address' => request()->ip(),
            ]);
            return $response;
        } catch (\Exception $e) {
            $this->logInterface->save([
                'modele'     => 'OPERATION_COMPTABLE',
                'action'     => 'Tentative Modification Opération',
                'statut'     => 'ECHEC',
                'message'    => $e->getMessage(),
                'ip_address' => request()->ip(),
            ]);
            return redirect()->back()->with('error', 'Erreur lors de la mise à jour de l\'opération.');
        }
    }

    // ─── Confirmation suppression ─────────────────────────────────────────
    public function confirmDelete($id)
    {
        try {
            $response = $this->operationInterface->confirmDelete($id);
            $this->logInterface->save([
                'modele'     => 'OPERATION_COMPTABLE',
                'action'     => 'Affichage Confirmation Suppression',
                'statut'     => 'SUCCES',
                'message'    => 'Page de confirmation de suppression, id: ' . $id,
                'ip_address' => request()->ip(),
            ]);
            return $response;
        } catch (\Exception $e) {
            $this->logInterface->save([
                'modele'     => 'OPERATION_COMPTABLE',
                'action'     => 'Tentative Confirmation Suppression',
                'statut'     => 'ECHEC',
                'message'    => $e->getMessage(),
                'ip_address' => request()->ip(),
            ]);
            return redirect()->back()->with('error', 'Opération introuvable.');
        }
    }

    // ─── Suppression ──────────────────────────────────────────────────────
    public function delete(Request $request)
    {
        try {
            $response = $this->operationInterface->delete($request);
            $this->logInterface->save([
                'modele'     => 'OPERATION_COMPTABLE',
                'action'     => 'Suppression Opération',
                'statut'     => 'SUCCES',
                'message'    => 'Opération supprimée avec succès, id: ' . $request->id,
                'ip_address' => request()->ip(),
            ]);
            return $response;
        } catch (\Exception $e) {
            $this->logInterface->save([
                'modele'     => 'OPERATION_COMPTABLE',
                'action'     => 'Tentative Suppression Opération',
                'statut'     => 'ECHEC',
                'message'    => $e->getMessage(),
                'ip_address' => request()->ip(),
            ]);
            return redirect()->back()->with('error', 'Erreur lors de la suppression de l\'opération.');
        }
    }
}
