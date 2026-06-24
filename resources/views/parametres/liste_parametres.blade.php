@extends('app')

@section('content')

 <h1 class="mt-4">Liste des paramètres</h1>
 <hr />

<a class="btn btn-primary mb-3" href="{{route('parametre.formAjout')}}">
     Ajouter paramètre
</a>

<table class="table table-striped table-bordered mt-2">
  <thead class="table-dark">
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Code</th>
      <th scope="col">Libellé</th>
      <th scope="col" colspan="3" class="text-center">Actions</th>
    </tr>
  </thead>
  <tbody>
     @forelse ($listeParametres as $parametre)
        <tr>
        <th scope="row">{{$parametre->id}}</th>
        <td>{{$parametre->code}}</td>
        <td>{{$parametre->libelle}}</td>
        <td class="text-center">
            <a href="{{route('parametre.read', $parametre->id)}}" class="btn btn-outline-primary btn-sm">consulter</a>
        </td>
        <td class="text-center">
            <a href="{{route('parametre.formModifier', $parametre->id)}}" class="btn btn-outline-warning btn-sm">modifier</a>
        </td>
        <td class="text-center">
            <a href="{{route('parametre.delete', $parametre->id)}}" class="btn btn-outline-danger btn-sm" onclick="return confirm('Voulez-vous vraiment supprimer ce paramètre ?')">supprimer</a>
        </td>
        </tr>
     @empty
        <tr>
            <td colspan="6" class="text-center text-muted">Aucun paramètre enregistré.</td>
        </tr>
     @endforelse
  </tbody>
</table>

@endsection
