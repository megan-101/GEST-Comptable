<?php

namespace App\Listeners;

use App\Events\PostComptableEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;


class createPostComptable
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
    public function handle(PostComptableEvent $event): void
    {
        //recupere le PostComptable cree 
        //$createdPostComptable = $event->postComptable;

        //preparation du message des logs 
        // $message = "Post Comptable creer avec succes: capacite" .$createdPostComptable->capacite
        //             ."libelle:".$createdPostComptable->libelle;
                    
                    $message = "Post Comptable creer avec succes: capacite";

                    $date = date ("Y-m-d H:i:s");

        //ecriture dans le fichier des logs
        Log::channel('ajout_PostComptable')->info($message."-".$date);

    }
}
