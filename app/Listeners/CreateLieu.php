<?php

namespace App\Listeners;

use App\Events\LieuEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class createLieu
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
        //
    }
}
