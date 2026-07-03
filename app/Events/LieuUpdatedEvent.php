<?php

namespace App\Events;

use App\Models\Lieu;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class LieuUpdatedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $lieu;

    /**
     * Create a new event instance.
     */
    public function __construct(Lieu $lieu)
    {
        $this->lieu = $lieu;
    }

    /**
     * Get the channels the event should broadcast on.
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
