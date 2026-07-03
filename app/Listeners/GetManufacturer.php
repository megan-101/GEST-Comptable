<?php

namespace App\Listeners;

use App\Events\GetManufacturerEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class GetManufacturer
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
    public function handle(GetManufacturerEvent $event): void
    {
         //preparetion du message de log
         $message = "Tous les Manufacturers ont ete recuperes avec succes";
                     
         $date = date("Y-m-d H:i:s");
 
         //ecriture dans le fichier de log
         Log::channel('getall_manufacturer')->info($message." - ".$date);
    }
}
