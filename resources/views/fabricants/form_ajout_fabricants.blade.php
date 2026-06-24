@extends('app')

@section('content')

<h1>
    Ajout d'un fabricant
</h1>
<hr />


<a class="btn btn-primary" href="{{route('fabricant.All')}}">Retour </a>

<div>
    <form method="POST" action="{{route('fabricant.create')}}">
    @csrf
    <div>
        <label for="Code">Code</label>
        <input type="text" class ="form-control" name="code" id="code" aria-describely="code">
    </div>

    <div>

        <label for="Libelle">Libelle</label>
        <input type="text" class ="form-control" name="libelle" id="libelle" aria-describely="libelle">
        <button type=" submit" class= "btn btn-primary"> Ajouter </button>

    </div>
</form>
</div>