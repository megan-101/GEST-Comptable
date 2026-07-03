@extends('app')

@section('content')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<h1>Ajout d'une Opération Comptable</h1>
<hr />

<a class="btn btn-secondary mb-3" href="{{ route('operation.All') }}">Retour à la liste</a>

<div class="card" style="max-width: 700px;">
    <div class="card-body">
        <form method="POST" action="{{ route('operation.create') }}">
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

            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="reference">Référence unique</label>
                    <input type="text" class="form-control" name="reference" id="reference" value="{{ old('reference') }}" required>
                </div>
                <div class="col-md-6 form-group">
                    <label for="date_operation">Date d'opération</label>
                    <input type="date" class="form-control" name="date_operation" id="date_operation" value="{{ old('date_operation', date('Y-m-d')) }}" required>
                </div>
            </div>

            <div class="form-group">
                <label for="libelle">Libellé</label>
                <input type="text" class="form-control" name="libelle" id="libelle" value="{{ old('libelle') }}" required>
            </div>

            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="montant_debit">Montant Débit</label>
                    <input type="number" step="0.01" class="form-control" name="montant_debit" id="montant_debit" value="{{ old('montant_debit', 0) }}" required>
                </div>
                <div class="col-md-6 form-group">
                    <label for="montant_credit">Montant Crédit</label>
                    <input type="number" step="0.01" class="form-control" name="montant_credit" id="montant_credit" value="{{ old('montant_credit', 0) }}" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="post_comptable_id">Poste Comptable</label>
                    <select class="form-control" name="post_comptable_id" id="post_comptable_id">
                        <option value="">-- Sélectionner un poste --</option>
                        @foreach($postComptables as $post)
                            <option value="{{ $post->id }}" {{ old('post_comptable_id') == $post->id ? 'selected' : '' }}>
                                {{ $post->libelle }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 form-group">
                    <label for="lieu_id">Lieu</label>
                    <select class="form-control" name="lieu_id" id="lieu_id">
                        <option value="">-- Sélectionner un lieu --</option>
                        @foreach($lieux as $l)
                            <option value="{{ $l->id }}" {{ old('lieu_id') == $l->id ? 'selected' : '' }}>
                                {{ $l->libelle }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" id="description" rows="3">{{ old('description') }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary btn-block">Enregistrer l'opération</button>
        </form>
    </div>
</div>

@endsection
