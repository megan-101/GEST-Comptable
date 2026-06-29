<?php

namespace App\Listeners;

use App\Events\LieuEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
class CreateLieu
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
    public function handle(LieuEvent $event): void
    {
        //recupere le lieu cree 
        $createdLieu = $event->lieu;
        // preparation du message des log 

        $message = "Lieu cree Avec Succes: nom:".$createdLieu->code
        ."libelle:".$createdLieu->libelle;
        $date =date("Y-m-d H:i:s");
       // $message = $date." ".$message;

        //ecriture dans le fichier log 
        Log::channel('ajout_lieu')->info($message."  - ".$date);
        
    }
}
