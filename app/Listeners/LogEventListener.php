<?php

namespace App\Listeners;

use App\Events\LogEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Log;

class LogEventListener
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
    public function handle(LogEvent $event): void
    {
        //recuperation des $data passees en parametres
        $data = $event->data;
        
        Log::create(
            [
                'modele' => $data['modele'],
                'action' => $data['action'],
                'message' => $data['message'],
                'statut' => $data['statut'],
                'ip_address' => $data['ip_address'],
                'date' =>  date("Y-m-d H:i:s")
            ]
        );

    }
}
