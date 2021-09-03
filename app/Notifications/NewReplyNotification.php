<?php

namespace App\Notifications;

use App\Models\Reply;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewReplyNotification extends Notification
{
    use Queueable;
    public $reply;


    public function __construct(Reply $reply)
    {
        $this->reply = $reply;
    }


    public function via($notifiable)
    {
        return ['mail','database'];
    }


    public function toMail(User $user)
    {
        return (new NewReplyEmail($this->reply))->to($user->emailAddress(), $user->name());
    }

    public function toDatabase($notifiable)
    {
        return [
            'type' => 'new_reply',
            'reply' => $this->reply->id(),
            'replyable_id' => $this->reply->replyable_id,
            'replyable_type' => $this->reply->replyable_type,
            'replyable_subject' => $this->reply->replyable()->replyAbleSubject(),
        ];
    }
}
