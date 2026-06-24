@extends('app')

@section('content')


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
   
</head>
 <h1>
        Modifier batiments
        <hr/>
    </h1>
<body>
   

<div class="container">
<form action="{{route('batiment.update')}}" method="POST">
   
<div>
    <form method="POST" action="{{route('batiment.update')}}">
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

    </div> 
    
    <button type=" submit" class= "btn btn-primary"> modifier</button>


    </form>
</div>
    
</body>
</html>