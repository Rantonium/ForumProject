<?php

namespace App\Mail;

use App\Models\Reply;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewReplyEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $reply;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Reply $reply)
    {
        $this->reply = $reply;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("Re: {$this->reply->replyAble()->subject()}")->markdown('emails.new_reply');
    }
}
