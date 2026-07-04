<?php

namespace App\Listeners;

use App\Events\TransformationEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class TransformationListener
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
    public function handle(TransformationEvent $event): void
    {
        Log::info('Événement Transformation déclenché pour ID: ' . ($event->transformation->id ?? 'N/A'));
        // Access the transformation via $event->transformation
    }
}
