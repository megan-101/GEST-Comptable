@extends('app')

@section('content')

<h1 class="mt-4 text-dark font-weight-bold">Détails de la ligne comptable</h1>
<p class="text-muted">Fiche détaillée du mouvement d'écriture.</p>
<hr />

<div class="row">
    <!-- Fiche Ligne Comptable -->
    <div class="col-md-6 mb-4">
        <div class="card shadow-sm border-0 h-100">
            <div class="card-header bg-primary text-white py-3">
                <h5 class="card-title mb-0 fw-bold">Informations de la Ligne</h5>
            </div>
            <div class="card-body py-4">
                <table class="table table-borderless align-middle mb-0">
                    <tr>
                        <td class="text-muted" style="width: 150px;">Identifiant :</td>
                        <td class="fw-bold">#{{ $ligne->id }}</td>
                    </tr>
                    <tr>
                        <td class="text-muted">Compte Comptable :</td>
                        <td>
                            <span class="badge bg-dark font-monospace px-3 py-2 fs-6">{{ $ligne->compte }}</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-muted">Sens de l'opération :</td>
                        <td>
                            @if(strtoupper($ligne->type_op) === 'D')
                                <span class="badge bg-success px-3 py-2">Débit</span>
                            @else
                                <span class="badge bg-danger px-3 py-2">Crédit</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="text-muted">Montant :</td>
                        <td class="fs-4 fw-bold text-primary">
                            {{ number_format($ligne->montant, 0, ',', ' ') }}
                        </td>
                    </tr>
                    <tr>
                        <td class="text-muted">Référence :</td>
                        <td><span class="text-dark">{{ $ligne->ref ?? 'Aucune référence' }}</span></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <!-- Écriture Comptable Rattachée -->
    <div class="col-md-6 mb-4">
        <div class="card shadow-sm border-0 h-100">
            <div class="card-header bg-dark text-white py-3">
                <h5 class="card-title mb-0 fw-bold">Écriture Comptable Rattachée</h5>
            </div>
            <div class="card-body py-4 d-flex flex-column justify-content-between">
                @if($ligne->ecriture)
                    <table class="table table-borderless align-middle mb-0">
                        <tr>
                            <td class="text-muted" style="width: 150px;">N° Écriture :</td>
                            <td class="fw-bold text-dark">{{ $ligne->ecriture->numero }}</td>
                        </tr>
                        <tr>
                            <td class="text-muted">Date d'opération :</td>
                            <td>{{ \Carbon\Carbon::parse($ligne->ecriture->date)->format('d/m/Y') }}</td>
                        </tr>
                        <tr>
                            <td class="text-muted">Devise :</td>
                            <td>
                                <span class="badge bg-secondary px-2 py-1">{{ $ligne->ecriture->devise }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-muted">ID Opération :</td>
                            <td>#{{ $ligne->ecriture->operation_id ?? 'Aucune' }}</td>
                        </tr>
                    </table>
                @else
                    <div class="text-center py-4 my-auto">
                        <span class="fs-1 d-block mb-3">🔗</span>
                        <h6 class="fw-bold text-secondary">Rattachée à l'Écriture ID #{{ $ligne->ecriture_id }}</h6>
                        <p class="text-muted small px-3">
                            Les détails complets de cette écriture seront visibles dès que le module des Écritures aura été intégré par votre équipe.
                        </p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="mt-2">
    <a href="{{ route('lignecomptable.index') }}" class="btn btn-outline-secondary px-4">
        Retour à la liste
    </a>
</div>

@endsection
