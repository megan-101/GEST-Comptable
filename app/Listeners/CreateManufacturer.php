<?php

namespace App\Listeners;

use App\Events\ManufacturerEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class CreateManufacturer
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
    public function handle(ManufacturerEvent $event): void
    {
        //recupere le manufacturer cree
        $createdManufacturer = $event->manufacturer;

        //preparetion du message de log
        $message = "Manufacturer Cree Avec Succes: nom:" .$createdManufacturer->nom
                    ." prenom:".$createdManufacturer->prenom;
                    
        $date = date("Y-m-d H:i:s");

        //ecriture dans le fichier de log
        Log::channel('ajout_manufacturer')->info($message." - ".$date);

    }
}
