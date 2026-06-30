<?php
namespace App\Interface 

interface UtilisateurInteface
{

    /**
     * les interface ne contienne que les definitions des fonctions 
     * nom de la fonction , type , et ses arguments 
     * aucune logique metier n'est implementer dans les interface 
     */

    public function index () : view ; 

    public function store (Request $request) : 
}