<?php

namespace App\Events;

use App\Models\PostComptable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PostComptableEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(public PostComptable $postomptable)
    {
    }

    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
