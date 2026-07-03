@extends('app')

@section('content')
    <div class="container mt-5">
        <div class="card border border-primary shadow-sm" style="max-width: 600px; margin: 0 auto;">
            <div class="card-header bg-primary text-white">
                <h1 class="h4 mb-0">Modifier un Compte</h1>
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
                <form action="{{ route('compte.update', $compte) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="id" class="form-label font-weight-bold">ID (non modifiable)</label>
                        <input type="text" class="form-control bg-light" id="id" value="{{ $compte->id }}" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="valeur" class="form-label font-weight-bold">Valeur</label>
                        <input type="text" value="{{ old('valeur', $compte->valeur) }}" name="valeur" class="form-control" id="valeur" required>
                    </div>

                    <div class="mb-3">
                        <label for="flag_modif" class="form-label font-weight-bold">Flag Modif</label>
                        <input type="text" value="{{ old('flag_modif', $compte->flag_modif) }}" name="flag_modif" class="form-control" id="flag_modif" required>
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <button type="submit" class="btn btn-primary px-4">Modifier</button>
                        <a href="{{ route('compte.index') }}" class="btn btn-outline-danger">Annuler</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
