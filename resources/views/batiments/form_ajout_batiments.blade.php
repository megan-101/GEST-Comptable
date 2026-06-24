@extends('app')

@section('content')

<h1>
    Ajout d'un batiments
</h1>
<hr />


<a class="btn btn-primary" href="{{route('batiment.All')}}">Retour </a>

<div>
    <form method="POST" action="{{route('batiment.create')}}">
    @csrf
    <div>
        <label for="ibn">ibn</label>
        <input type="text" class ="form-control" name="ibn" id="ibn" aria-describely="ibn">
    </div>

    <div>

        <label for="nom_batiment">nom_batiment</label>
        <input type="text" class ="form-control" name="nom_batiment" id="nom_batiment" aria-describely="nom_batiment">
    </div>
    <div>

        <label for="nom_propriétaire">nom_propriétaire</label>
        <input type="text" class ="form-control" name="nom_propriétaire" id="nom_propriétaire" aria-describely="nom_propriétaire">
        <button type=" submit" class= "btn btn-primary"> Ajouter </button>

    </div>
</form>
</div>