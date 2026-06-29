@extends('app')

@section('content')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<h1>Consulter un PostComptable</h1>
<hr />

<a class="btn btn-secondary mb-3" href="{{ route('PostComptable.All') }}">Retour à la liste</a>

<div class="card" style="max-width: 600px;">
    <div class="card-body">
        <div class="form-group">
            <label>Id</label>
            <input type="text" class="form-control" value="{{ $PostComptable->id }}" readonly>
        </div>

        <div class="form-group">
            <label>capacite</label>
            <input type="text" class="form-control" value="{{ $PostComptable->capacite }}" readonly>
        </div>

        <div class="form-group">
            <label>Libellé</label>
            <input type="text" class="form-control" value="{{ $PostComptable->libelle }}" readonly>
        </div>
    </div>
</div>

@endsection
