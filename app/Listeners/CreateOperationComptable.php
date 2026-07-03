<?php

namespace App\Listeners;

use App\Events\OperationComptableCreatedEvent;
use App\Models\ActivityLog;
use Illuminate\Support\Facades\Log;

class CreateOperationComptable
{
    public function __construct() {}

    public function handle(OperationComptableCreatedEvent $event): void
    {
        $op   = $event->operationComptable;
        $date = now()->format('Y-m-d H:i:s');
        $desc = "Opération comptable créée - ref: {$op->reference}, libelle: {$op->libelle} - {$date}";

        Log::info($desc);

        ActivityLog::create([
            'module'      => 'OperationComptable',
            'action'      => 'create',
            'description' => $desc,
            'status'      => 'success',
        ]);
    }
}
