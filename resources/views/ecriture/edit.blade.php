@extends('app')

@section('content')
    <div class="container mt-5">
        <div class="card border border-primary shadow-sm" style="max-width: 600px; margin: 0 auto;">
            <div class="card-header bg-primary text-white">
                <h1 class="h4 mb-0">Modifier une Écriture Comptable</h1>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('ecriture.update', $ecritureComptable) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label for="id" class="form-label font-weight-bold">ID (non modifiable)</label>
                        <input type="text" class="form-control bg-light" id="id" value="{{ $ecritureComptable->id }}" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="numero" class="form-label font-weight-bold">Numéro</label>
                        <input type="text" value="{{ old('numero', $ecritureComptable->numero) }}" name="numero" class="form-control" id="numero" required>
                    </div>

                    <div class="mb-3">
                        <label for="date" class="form-label font-weight-bold">Date</label>
                        <input type="date" value="{{ old('date', $ecritureComptable->date) }}" name="date" class="form-control" id="date" required>
                    </div>

                    <div class="mb-3">
                        <label for="operation_id" class="form-label font-weight-bold">ID Opération</label>
                        <input type="number" value="{{ old('operation_id', $ecritureComptable->operation_id) }}" name="operation_id" class="form-control" id="operation_id" required>
                    </div>

                    <div class="mb-3">
                        <label for="devise" class="form-label font-weight-bold">Devise</label>
                        <input type="text" value="{{ old('devise', $ecritureComptable->devise) }}" name="devise" class="form-control" id="devise" required>
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <button type="submit" class="btn btn-primary px-4">Modifier</button>
                        <a href="{{ route('ecriture.index') }}" class="btn btn-outline-danger">Annuler</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
