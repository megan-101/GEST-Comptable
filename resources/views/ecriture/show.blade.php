@extends('app')

@section('content')
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h2 text-dark">Consulter une Écriture Comptable</h1>
        </div>

        <div class="mb-3">
            <a class="btn btn-secondary" href="{{ route('ecriture.index') }}">Retour à la liste</a>
            <a class="btn btn-warning ms-2" href="{{ route('ecriture.edit', $ecritureComptable) }}">Modifier</a>
        </div>

        <div class="card shadow-sm border-0" style="max-width: 600px;">
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label font-weight-bold">ID</label>
                    <input type="text" class="form-control bg-light" value="{{ $ecritureComptable->id }}" readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label font-weight-bold">Numéro</label>
                    <input type="text" class="form-control bg-light" value="{{ $ecritureComptable->numero }}" readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label font-weight-bold">Date</label>
                    <input type="text" class="form-control bg-light" value="{{ $ecritureComptable->date }}" readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label font-weight-bold">ID Opération</label>
                    <input type="text" class="form-control bg-light" value="{{ $ecritureComptable->operation_id }}" readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label font-weight-bold">Devise</label>
                    <input type="text" class="form-control bg-light" value="{{ $ecritureComptable->devise }}" readonly>
                </div>
            </div>
        </div>
    </div>
@endsection
