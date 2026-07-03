<?php

namespace App\Listeners;

use App\Events\LieuEvent;
use App\Models\ActivityLog;
use Illuminate\Support\Facades\Log;

class CreateLieu
{
    public function __construct()
    {
        //
    }

    public function handle(LieuEvent $event): void
    {
        $createdLieu = $event->lieu;
        $date = date('Y-m-d H:i:s');
        $description = "Lieu créé avec succès - code: {$createdLieu->code}, libelle: {$createdLieu->libelle} - {$date}";

        // Log dans le fichier
        Log::channel('ajout_lieu')->info($description);

        // Log dans la base de données
        ActivityLog::create([
            'module'      => 'Lieu',
            'action'      => 'create',
            'description' => $description,
            'status'      => 'success',
        ]);
    }
}
