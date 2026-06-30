<?php

namespace App\Listeners;

use App\Events\ParametreActivityEvent;
use App\Models\Log as LogModel;

class LogParametreActivity
{
    /**
     * Handle the event.
     */
    public function handle(ParametreActivityEvent $event): void
    {
        LogModel::create([
            'action' => $event->action,
            'message' => $event->message,
            'ip_address' => request()->ip() ?? '127.0.0.1',
        ]);
    }
}
