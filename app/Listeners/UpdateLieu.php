<?php

namespace App\Listeners;

use App\Events\LieuUpdatedEvent;
use App\Models\ActivityLog;
use Illuminate\Support\Facades\Log;

class UpdateLieu
{
    public function __construct()
    {
        //
    }

    public function handle(LieuUpdatedEvent $event): void
    {
        $lieu = $event->lieu;
        $date = date('Y-m-d H:i:s');
        $description = "Lieu modifié avec succès - code: {$lieu->code}, libelle: {$lieu->libelle} - {$date}";

        // Log dans le fichier log custom (ajout_lieu)
        Log::channel('ajout_lieu')->info($description);

        // Log dans la base de données
        ActivityLog::create([
            'module'      => 'Lieu',
            'action'      => 'update',
            'description' => $description,
            'status'      => 'success',
        ]);
    }
}
