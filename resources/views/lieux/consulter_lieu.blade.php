@extends('app')

@section('content')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<h1>Consulter un Lieu</h1>
<hr />

<a class="btn btn-secondary mb-3" href="{{ route('lieu.All') }}">Retour à la liste</a>
<a class="btn btn-warning mb-3 ml-2" href="{{ route('lieu.formUpdate', $lieu->id) }}">Modifier</a>

<div class="card" style="max-width: 600px;">
    <div class="card-body">
        <div class="form-group">
            <label>Id</label>
            <input type="text" class="form-control" value="{{ $lieu->id }}" readonly>
        </div>

        <div class="form-group">
            <label>Code</label>
            <input type="text" class="form-control" value="{{ $lieu->code }}" readonly>
        </div>

        <div class="form-group">
            <label>Libellé</label>
            <input type="text" class="form-control" value="{{ $lieu->libelle }}" readonly>
        </div>

        <div class="form-group">
            <label>Adresse</label>
            <input type="text" class="form-control" value="{{ $lieu->adresse }}" readonly>
        </div>
    </div>
</div>

@endsection
