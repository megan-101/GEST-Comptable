@extends('app')

@section('content')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<h1 class="mt-4">Modifier un Modèle de Transformation</h1>
<hr />

<a class="btn btn-secondary mb-3" href="{{ route('modele-transformation.All') }}">Retour à la liste</a>

<div class="card" style="max-width: 600px;">
    <div class="card-body">
        <form method="POST" action="{{ route('modele-transformation.update', $modele->id) }}">
            @csrf

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="form-group">
                <label for="schema">Schéma de transformation</label>
                <input type="text" class="form-control" name="schema" id="schema" value="{{ old('schema', $modele->schema) }}" required>
            </div>

            <div class="form-group form-check mb-3">
                <input type="checkbox" class="form-check-input" name="flag_piece" id="flag_piece" value="1" {{ old('flag_piece', $modele->flag_piece) ? 'checked' : '' }}>
                <label class="form-check-label font-weight-bold" for="flag_piece">Valider la pièce</label>
            </div>

            <div class="form-group">
                <label for="mask_piece">Masque / Format de la pièce</label>
                <input type="text" class="form-control" name="mask_piece" id="mask_piece" value="{{ old('mask_piece', $modele->mask_piece) }}">
            </div>

            <div class="form-group form-check mb-3">
                <input type="checkbox" class="form-check-input" name="flag_compte" id="flag_compte" value="1" {{ old('flag_compte', $modele->flag_compte) ? 'checked' : '' }}>
                <label class="form-check-label font-weight-bold" for="flag_compte">Valider le compte</label>
            </div>

            <div class="form-group">
                <label for="mask_compte">Masque / Format du compte</label>
                <input type="text" class="form-control" name="mask_compte" id="mask_compte" value="{{ old('mask_compte', $modele->mask_compte) }}">
            </div>

            <button type="submit" class="btn btn-warning">Enregistrer les modifications</button>
        </form>
    </div>
</div>

@endsection
