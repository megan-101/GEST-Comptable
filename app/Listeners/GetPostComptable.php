<?php

namespace App\Listeners;

use App\Events\PostComptableEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;


class GetPostComptable
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
        //
          $message = "Post Comptable recuperer avec succes: capacite";

                    $date = date ("Y-m-d H:i:s");

        //ecriture dans le fichier des logs
        Log::channel('getall_PostComptable')->info($message."-".$date);

    }
}
