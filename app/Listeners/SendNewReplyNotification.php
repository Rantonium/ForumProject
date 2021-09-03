<?php

namespace App\Listeners;

use App\Events\ReplyWasCreatedEvent;
use App\Notifications\NewReplyNotification;

class SendNewReplyNotification
{

    public function handle(ReplyWasCreatedEvent $event)
    {
        $thread = $event->reply->replyAble();
        $thread->author()->notify(new NewReplyNotification($event->reply));
    }
}
