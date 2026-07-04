<?php

namespace App\Events;

use App\Models\Transformation;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TransformationEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $transformation;

    /**
     * Create a new event instance.
     */
    public function __construct(Transformation $transformation)
    {
        $this->transformation = $transformation;
    }
}
