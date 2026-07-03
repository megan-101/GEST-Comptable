<?php

namespace App\Events;

use App\Models\OperationComptable;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class OperationComptableCreatedEvent
{
    use Dispatchable, SerializesModels;

    public OperationComptable $operationComptable;

    public function __construct(OperationComptable $operationComptable)
    {
        $this->operationComptable = $operationComptable;
    }
}
