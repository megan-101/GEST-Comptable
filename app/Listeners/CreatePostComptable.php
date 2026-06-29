<?php

namespace App\Listeners;

use App\Events\PostComptableEvent;
use Illuminate\Support\Facades\Log;

class CreatePostComptable
{
    public function handle(PostComptableEvent $event): void
    {
        $createdPostComptable = $event->postComptable;

        $message = 'Post comptable créé avec succès: capacite ' . $createdPostComptable->capacite
            . ', libelle: ' . $createdPostComptable->libelle;

        $date = date('Y-m-d H:i:s');

        Log::channel('ajout_PostComptable')->info($message . ' - ' . $date);
    }
}
