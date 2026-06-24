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
        Modifier fabricants
        <hr/>
    </h1>
<body>
   

<div class="container">
<form action="{{route('fabricant.update')}}" method="POST">
   
<div>
    <form method="POST" action="{{route('fabricant.update')}}">
    @csrf
    <div>
        <label for="Code">Code</label>
        <input type="text" class ="form-control" name="code" id="code" aria-describely="code">
    </div>

    <div>

        <label for="Libelle">Libelle</label>
        <input type="text" class ="form-control" name="libelle" id="libelle" aria-describely="libelle">

    </div> <button type=" submit" class= "btn btn-primary"> modifier</button>


    </form>
</div>
    
</body>
</html>