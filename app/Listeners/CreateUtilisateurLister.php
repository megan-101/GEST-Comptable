<?php

namespace App\Listeners;

use App\Events\UtilisateurEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\InteractsWithQueue;

class CreateUtilisateurLister
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UtilisateurEvent $event): void
    {
        // recupérer l'utilisateur créer 

        $createdUtilisateur = $event-> utilisateur ;

        //préparation du message 

        $message = "Utilisateu créer : Nom:". $createdUtilisateur->nom;

        $date = date("Y-m-d H:i:s");

        //ecriture dna sle fichier de log 

        Log::channel('ajout_Utilisateur')->info($message."-".$date);
  
    }
}
