<?php

namespace App\Listeners;

use App\Events\UtilisateurEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Log;

class LogActionUserListener
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
        Log::create([
            'action' => $event->action,
            'message' => $event->message,
            'ip_address' => request()->ip(),
        ]);
    }
}
