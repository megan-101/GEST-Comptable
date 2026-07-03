<?php

namespace App\Listeners;

use App\Events\OperationComptableDeletedEvent;
use App\Models\ActivityLog;
use Illuminate\Support\Facades\Log;

class DeleteOperationComptable
{
    public function __construct() {}

    public function handle(OperationComptableDeletedEvent $event): void
    {
        $op   = $event->operationComptable;
        $date = now()->format('Y-m-d H:i:s');
        $desc = "Opération comptable supprimée - ref: {$op->reference}, libelle: {$op->libelle} - {$date}";

        Log::info($desc);

        ActivityLog::create([
            'module'      => 'OperationComptable',
            'action'      => 'delete',
            'description' => $desc,
            'status'      => 'success',
        ]);
    }
}
