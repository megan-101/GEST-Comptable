<?php

namespace App\Listeners;

use App\Events\TraceEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class Trace
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
    public function handle(TraceEvent $event): void
    {
         Trace::create(
            [
                'action' => $event->action,
                'message' => $event->message,
                'utilisateur_id' => auth()->id(),
            ]);
    }
}
