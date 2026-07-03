@extends('app')

@section('content')
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h2 text-dark">Consulter un Compte</h1>
        </div>

        <div class="mb-3">
            <a class="btn btn-secondary" href="{{ route('compte.index') }}">Retour à la liste</a>
            <a class="btn btn-warning ms-2" href="{{ route('compte.edit', $compte) }}">Modifier</a>
        </div>

        <div class="card shadow-sm border-0" style="max-width: 600px;">
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label font-weight-bold">ID</label>
                    <input type="text" class="form-control bg-light" value="{{ $compte->id }}" readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label font-weight-bold">Valeur</label>
                    <input type="text" class="form-control bg-light" value="{{ $compte->valeur }}" readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label font-weight-bold">Flag Modif</label>
                    <input type="text" class="form-control bg-light" value="{{ $compte->flag_modif }}" readonly>
                </div>
            </div>
        </div>
    </div>
@endsection
