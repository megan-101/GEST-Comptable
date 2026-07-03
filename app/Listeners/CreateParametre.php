<?php

namespace App\Listeners;

use App\Events\ParametreEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class CreateParametre
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
    public function handle(ParametreEvent $event): void
    {
        //recupere le parametre cree
        $createParametre = $event->parametre; 

        //preparation du message de log
        $message = "Parametre Cree avec succes: code" .$createParametre->code;
        
        $date = date("Y-m-d H:i:s");

        //ecriture dans le fichier de log
        Log::channel('ajout_parametre')->info($message." - ".$date);
    }
}
