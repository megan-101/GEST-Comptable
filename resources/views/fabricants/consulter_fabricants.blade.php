@extends('app')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulter fabricants</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
   
</head>
<body>

<div class="container">
<form>
      <a href="liste_fabricants.blade.php">
        <button type="button" class= "btn btn-primary"> Retour à la liste</button>
    </a> 
<div>
    <form method="POST">
    @csrf
    <div>
        <label for="Code">Code</label>
        <input type="text" class ="form-control" name="code" id="code" aria-describely="code" value="{{$fabricant->code}}" readonly>
    </div>

    <div>

        <label for="Libelle">Libelle</label>
        <input type="text" class ="form-control" name="libelle" id="libelle" aria-describely="libelle" value="{{$fabricant->code}}" readonly>

    </div>
</div>
    
</body>
</html>