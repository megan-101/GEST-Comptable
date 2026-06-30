<?php

namespace App\Http\Controllers;

use App\interfaces\LieuInterface;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LieuController extends Controller
{
    protected LieuInterface $lieuInterface;

    public function __construct(LieuInterface $lieuInterface)
    {
        $this->lieuInterface = $lieuInterface;
    }

    // ─────────────────────────────────────────────────────────────
    // Liste de tous les lieux
    // ─────────────────────────────────────────────────────────────
    public function all()
    {
        try {
            return $this->lieuInterface->all();
        } catch (\Exception $e) {
            Log::channel('ajout_lieu')->error('[Controller] all() : ' . $e->getMessage());
            ActivityLog::create([
                'module'        => 'Lieu',
                'action'        => 'all',
                'description'   => '[Controller] Erreur dans all().',
                'status'        => 'error',
                'error_message' => $e->getMessage(),
            ]);
            return redirect()->back()->with('error', 'Impossible de charger la liste des lieux.');
        }
    }

    // ─────────────────────────────────────────────────────────────
    // Formulaire d'ajout
    // ─────────────────────────────────────────────────────────────
    public function formAjout()
    {
        try {
            return $this->lieuInterface->formAjout();
        } catch (\Exception $e) {
            Log::channel('ajout_lieu')->error('[Controller] formAjout() : ' . $e->getMessage());
            ActivityLog::create([
                'module'        => 'Lieu',
                'action'        => 'formAjout',
                'description'   => '[Controller] Erreur dans formAjout().',
                'status'        => 'error',
                'error_message' => $e->getMessage(),
            ]);
            return redirect()->back()->with('error', 'Impossible de charger le formulaire d\'ajout.');
        }
    }

    // ─────────────────────────────────────────────────────────────
    // Création d'un lieu
    // ─────────────────────────────────────────────────────────────
    public function create(Request $request)
    {
        try {
            return $this->lieuInterface->create($request);
        } catch (\Exception $e) {
            Log::channel('ajout_lieu')->error('[Controller] create() : ' . $e->getMessage());
            ActivityLog::create([
                'module'        => 'Lieu',
                'action'        => 'create',
                'description'   => '[Controller] Erreur dans create().',
                'status'        => 'error',
                'error_message' => $e->getMessage(),
            ]);
            return redirect()->back()->with('error', 'Erreur lors de la création du lieu.');
        }
    }

    // ─────────────────────────────────────────────────────────────
    // Consulter un lieu
    // ─────────────────────────────────────────────────────────────
    public function read($id)
    {
        try {
            return $this->lieuInterface->read($id);
        } catch (\Exception $e) {
            Log::channel('ajout_lieu')->error("[Controller] read({$id}) : " . $e->getMessage());
            ActivityLog::create([
                'module'        => 'Lieu',
                'action'        => 'read',
                'description'   => "[Controller] Erreur dans read({$id}).",
                'status'        => 'error',
                'error_message' => $e->getMessage(),
            ]);
            return redirect()->back()->with('error', 'Lieu introuvable.');
        }
    }

    // ─────────────────────────────────────────────────────────────
    // Formulaire de modification
    // ─────────────────────────────────────────────────────────────
    public function formUpdate($id)
    {
        try {
            return $this->lieuInterface->formUpdate($id);
        } catch (\Exception $e) {
            Log::channel('ajout_lieu')->error("[Controller] formUpdate({$id}) : " . $e->getMessage());
            ActivityLog::create([
                'module'        => 'Lieu',
                'action'        => 'formUpdate',
                'description'   => "[Controller] Erreur dans formUpdate({$id}).",
                'status'        => 'error',
                'error_message' => $e->getMessage(),
            ]);
            return redirect()->back()->with('error', 'Lieu introuvable.');
        }
    }

    // ─────────────────────────────────────────────────────────────
    // Mise à jour d'un lieu
    // ─────────────────────────────────────────────────────────────
    public function update(Request $request, $id)
    {
        try {
            return $this->lieuInterface->update($request, $id);
        } catch (\Exception $e) {
            Log::channel('ajout_lieu')->error("[Controller] update({$id}) : " . $e->getMessage());
            ActivityLog::create([
                'module'        => 'Lieu',
                'action'        => 'update',
                'description'   => "[Controller] Erreur dans update({$id}).",
                'status'        => 'error',
                'error_message' => $e->getMessage(),
            ]);
            return redirect()->back()->with('error', 'Erreur lors de la mise à jour du lieu.');
        }
    }

    // ─────────────────────────────────────────────────────────────
    // Confirmation de suppression
    // ─────────────────────────────────────────────────────────────
    public function confirmDelete($id)
    {
        try {
            return $this->lieuInterface->confirmDelete($id);
        } catch (\Exception $e) {
            Log::channel('ajout_lieu')->error("[Controller] confirmDelete({$id}) : " . $e->getMessage());
            ActivityLog::create([
                'module'        => 'Lieu',
                'action'        => 'confirmDelete',
                'description'   => "[Controller] Erreur dans confirmDelete({$id}).",
                'status'        => 'error',
                'error_message' => $e->getMessage(),
            ]);
            return redirect()->back()->with('error', 'Lieu introuvable.');
        }
    }

    // ─────────────────────────────────────────────────────────────
    // Suppression d'un lieu
    // ─────────────────────────────────────────────────────────────
    public function delete(Request $request)
    {
        try {
            return $this->lieuInterface->delete($request);
        } catch (\Exception $e) {
            Log::channel('ajout_lieu')->error('[Controller] delete() : ' . $e->getMessage());
            ActivityLog::create([
                'module'        => 'Lieu',
                'action'        => 'delete',
                'description'   => '[Controller] Erreur dans delete().',
                'status'        => 'error',
                'error_message' => $e->getMessage(),
            ]);
            return redirect()->back()->with('error', 'Erreur lors de la suppression du lieu.');
        }
    }
}
