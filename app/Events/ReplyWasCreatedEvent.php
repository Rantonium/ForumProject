<?php

namespace App\Events;

use App\Models\Reply;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ReplyWasCreatedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $reply;

    public function __construct(Reply $reply)
    {
        $this->reply = $reply;
    }
}
