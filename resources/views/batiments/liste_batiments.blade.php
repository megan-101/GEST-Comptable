@extends('app')

@section('content')


<nav>
        <meta charset="UTF-8">
    <meta name="viewport" content="widtd=device-widtd, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</nav>

 <h1> liste des batiments</h1>
 <hr />
        

<a class="btn btn-primary" href="{{route('batiment.formAjout')}}" >
     Ajouter batiment
</a>

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">ibn</th>
      <th scope="col">nom_batiment</th>
      <th scope="col">nom_propriétaire</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
     @foreach ($listebatiments as $batiment)
        <tr>
        <th scope="row">{{$batiment->id}}</th>
        <td>{{$batiment->ibn }}</td>
        <td>{{$batiment->nom_batiment}}</td>
        <td>{{$batiment->nom_propriétaire}}</td>
        <td>{{$batiment->Actions}}</td>
        <td><a href="{{route('batiment.read', $batiment->id)}}" class= "btn btn-outline-primary">consulter</a></td>
        <td><a href="{{route('batiment.update', $batiment->id)}}" class= "btn btn-outline-primary">modifier</a></td>
        <td><a href="{{route('batiment.delete', $batiment->id)}}" class= "btn btn-outline-primary">supprimer</a></td>
        </tr>
    @endforeach
  </tbody>
</table>

@endsection