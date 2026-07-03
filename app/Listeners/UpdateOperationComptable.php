<?php

namespace App\Listeners;

use App\Events\OperationComptableUpdatedEvent;
use App\Models\ActivityLog;
use Illuminate\Support\Facades\Log;

class UpdateOperationComptable
{
    public function __construct() {}

    public function handle(OperationComptableUpdatedEvent $event): void
    {
        $op   = $event->operationComptable;
        $date = now()->format('Y-m-d H:i:s');
        $desc = "Opération comptable modifiée - ref: {$op->reference}, libelle: {$op->libelle} - {$date}";

        Log::info($desc);

        ActivityLog::create([
            'module'      => 'OperationComptable',
            'action'      => 'update',
            'description' => $desc,
            'status'      => 'success',
        ]);
    }
}
