<?php

namespace App\Listeners;

use App\Events\LieuDeletedEvent;
use App\Models\ActivityLog;
use Illuminate\Support\Facades\Log;

class DeleteLieu
{
    public function __construct()
    {
        //
    }

    public function handle(LieuDeletedEvent $event): void
    {
        $lieu = $event->lieu;
        $date = date('Y-m-d H:i:s');
        $description = "Lieu supprimé avec succès - code: {$lieu->code}, libelle: {$lieu->libelle} - {$date}";

        // Log dans le fichier log custom (ajout_lieu)
        Log::channel('ajout_lieu')->info($description);

        // Log dans la base de données
        ActivityLog::create([
            'module'      => 'Lieu',
            'action'      => 'delete',
            'description' => $description,
            'status'      => 'success',
        ]);
    }
}
