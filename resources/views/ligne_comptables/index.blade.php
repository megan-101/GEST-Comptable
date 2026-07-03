@extends('app')

@section('content')

<h1 class="mt-4 text-dark font-weight-bold">Liste des lignes comptables</h1>
<p class="text-muted">Consultez l'ensemble des mouvements Débit / Crédit générés automatiquement par le système.</p>
<hr />

@if($errors->any())
    <div class="alert alert-danger">
        {{ $errors->first() }}
    </div>
@endif

<div class="card shadow-sm border-0 mt-3">
    <div class="card-body p-0">
        <table class="table table-hover table-striped table-bordered mb-0">
            <thead class="table-dark">
                <tr>
                    <th scope="col" class="text-center" style="width: 80px;">Id</th>
                    <th scope="col" class="text-center" style="width: 120px;">N° Écriture</th>
                    <th scope="col">Compte</th>
                    <th scope="col" class="text-center" style="width: 120px;">Sens</th>
                    <th scope="col" class="text-end" style="width: 150px;">Montant</th>
                    <th scope="col">Référence</th>
                    <th scope="col" class="text-center" style="width: 120px;">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($listeLignes as $ligne)
                    <tr>
                        <th scope="row" class="text-center">{{ $ligne->id }}</th>
                        <td class="text-center">
                            <span class="badge bg-secondary">#{{ $ligne->ecriture_id }}</span>
                        </td>
                        <td>
                            <strong class="text-monospace">{{ $ligne->compte }}</strong>
                        </td>
                        <td class="text-center">
                            @if(strtoupper($ligne->type_op) === 'D')
                                <span class="badge bg-success px-3 py-2">Débit</span>
                            @else
                                <span class="badge bg-danger px-3 py-2">Crédit</span>
                            @endif
                        </td>
                        <td class="text-end fw-bold">
                            {{ number_format($ligne->montant, 0, ',', ' ') }}
                        </td>
                        <td>
                            <span class="text-muted">{{ $ligne->ref ?? '-' }}</span>
                        </td>
                        <td class="text-center">
                            <a href="{{ route('lignecomptable.show', $ligne->id) }}" class="btn btn-primary btn-sm px-3 shadow-sm">
                                <i class="bi bi-eye"></i> Consulter
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-4 text-muted">
                            <span class="d-block mb-2 fs-4">📭</span>
                            Aucune ligne comptable enregistrée.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
