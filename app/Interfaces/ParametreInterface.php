<?php

namespace App\Interfaces;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
interface ParametreInterface
{
    // Les interfaces ne contiennet que les definiions des fonctions
    // Nom de la fonction, type, et ses arguments
    // Aucune logique metier n'est implementée dans les interfaces


    public function all();
    
    // Creation d'un parametre
    public function create(Request $request);

    // Recuperation des donnees pour modifier un parametre
    public function update(Request $request, $id);

    // Trouver un parametre par son ID
    public function find($id);

    // Supprimer un parametre par son ID
    public function delete($id);
}