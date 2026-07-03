<?php

namespace App\Implementations;

use App\Events\OperationComptableCreatedEvent;
use App\Events\OperationComptableUpdatedEvent;
use App\Events\OperationComptableDeletedEvent;
use App\Interfaces\OperationComptableInterface;
use App\Models\Lieu;
use App\Models\OperationComptable;
use App\Models\PostComptable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OperationComptableImpl implements OperationComptableInterface
{
    // ─── Liste de toutes les opérations ───────────────────────────────────
    public function all()
    {
        try {
            $listeOperations = OperationComptable::with(['postComptable', 'lieu'])->latest()->get();
            return view('operations.liste_operations', compact('listeOperations'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erreur lors de la récupération des opérations comptables.');
        }
    }

    // ─── Formulaire d'ajout ───────────────────────────────────────────────
    public function formAjout()
    {
        $postComptables = PostComptable::all();
        $lieux          = Lieu::all();
        return view('operations.form_ajout_operation', compact('postComptables', 'lieux'));
    }

    // ─── Création ─────────────────────────────────────────────────────────
    public function create(Request $request)
    {
        $request->validate([
            'reference'        => 'required|unique:operations_comptables,reference',
            'libelle'          => 'required',
            'date_operation'   => 'required|date',
            'montant_debit'    => 'required|numeric|min:0',
            'montant_credit'   => 'required|numeric|min:0',
            'description'      => 'nullable|string',
            'post_comptable_id'=> 'nullable|exists:post_comptables,id',
            'lieu_id'          => 'nullable|exists:lieux,id',
        ]);

        try {
            DB::beginTransaction();
            $operation = OperationComptable::create($request->only([
                'reference', 'libelle', 'date_operation',
                'montant_debit', 'montant_credit', 'description',
                'post_comptable_id', 'lieu_id',
            ]));
            event(new OperationComptableCreatedEvent($operation));
            DB::commit();
            return redirect()->route('operation.All')->with('success', 'Opération comptable ajoutée avec succès.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Erreur lors de la création de l\'opération comptable.');
        }
    }

    // ─── Consulter ────────────────────────────────────────────────────────
    public function read($id)
    {
        try {
            $operation = OperationComptable::with(['postComptable', 'lieu'])->findOrFail($id);
            return view('operations.consulter_operation', compact('operation'));
        } catch (\Exception $e) {
            return redirect()->route('operation.All')->with('error', 'Opération introuvable.');
        }
    }

    // ─── Formulaire de modification ───────────────────────────────────────
    public function formUpdate($id)
    {
        try {
            $operation      = OperationComptable::findOrFail($id);
            $postComptables = PostComptable::all();
            $lieux          = Lieu::all();
            return view('operations.modifier_operation', compact('operation', 'postComptables', 'lieux'));
        } catch (\Exception $e) {
            return redirect()->route('operation.All')->with('error', 'Opération introuvable.');
        }
    }

    // ─── Mise à jour ──────────────────────────────────────────────────────
    public function update(Request $request, $id)
    {
        $request->validate([
            'reference'        => 'required|unique:operations_comptables,reference,' . $id,
            'libelle'          => 'required',
            'date_operation'   => 'required|date',
            'montant_debit'    => 'required|numeric|min:0',
            'montant_credit'   => 'required|numeric|min:0',
            'description'      => 'nullable|string',
            'post_comptable_id'=> 'nullable|exists:post_comptables,id',
            'lieu_id'          => 'nullable|exists:lieux,id',
        ]);

        try {
            DB::beginTransaction();
            $operation = OperationComptable::findOrFail($id);
            $operation->update($request->only([
                'reference', 'libelle', 'date_operation',
                'montant_debit', 'montant_credit', 'description',
                'post_comptable_id', 'lieu_id',
            ]));
            event(new OperationComptableUpdatedEvent($operation));
            DB::commit();
            return redirect()->route('operation.All')->with('success', 'Opération comptable modifiée avec succès.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Erreur lors de la mise à jour de l\'opération comptable.');
        }
    }

    // ─── Confirmation suppression ─────────────────────────────────────────
    public function confirmDelete($id)
    {
        try {
            $operation = OperationComptable::findOrFail($id);
            return view('operations.supprimer_operation', compact('operation'));
        } catch (\Exception $e) {
            return redirect()->route('operation.All')->with('error', 'Opération introuvable.');
        }
    }

    // ─── Suppression ──────────────────────────────────────────────────────
    public function delete(Request $request)
    {
        try {
            DB::beginTransaction();
            $operation = OperationComptable::findOrFail($request->id);
            $clone     = clone $operation;
            $operation->delete();
            event(new OperationComptableDeletedEvent($clone));
            DB::commit();
            return redirect()->route('operation.All')->with('success', 'Opération comptable supprimée avec succès.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Erreur lors de la suppression de l\'opération comptable.');
        }
    }
}
