<?php

namespace App\Interfaces;

Use Illuminate\View\View;
Use Illuminate\Http\Request;
use App\Models\PostComptable;





interface PostComptableInterface {
    // les interfaces ne contiennent que les definition des fonctions : nom_de_la_fonction , types et ses arguments.
    //  Aucune logique metier n'est implemente dans les interfaces


    public function create (Request $create):PostComptable;


/**
    *fonction qui renvoie une vue
    *public function index(): View;

 
    *fonction qui affiche le formulaire
   * public function store (Request $request):user;

    
    * fonction qui affiche le formulaire
    *public function edit ():user;

    
    * fonction persiste un user dans la bdd
    *public function update (Request $request):user;

    
    * fonction qui affiche le formulaire
    *public function delete (Request $request):user;
*/



}
