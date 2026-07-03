<?php

namespace App\Interfaces;
use Illuminate\Http\Request;
use Illuminate\View\View;

interface UserInterface
{
   /**
    * Les inteface ne contiennet que les defintions des fonctions 
    * nom de la fonctions type et ses argument^
    * aucune logique metier n'est implementer dans les interfaces
    */


  public function create(): View;

   // function qui affiche tous user
   public function index(): View;

   // function qui affiche le formulaire de creation d'un user
   public function store(Request $request): User;


   // function qui affiche le formulaire de creation d'un user
  

   public function edit(int $id): View;


   public function update(Request $request, int $id): User;

   public function delete(int $id): View;


   public function destroy(int $id): User;
}


