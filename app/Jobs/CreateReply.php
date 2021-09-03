<?php

namespace App\Jobs;

use App\Http\Requests\CreateReplyRequest;
use App\Models\Reply;
use App\Models\ReplyAble;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Mews\Purifier\Facades\Purifier;

class CreateReply implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $body, $author, $replyable;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(string $body, User $author, ReplyAble $replyable)
    {
        $this->body = $body;
        $this->author = $author;
        $this->replyable = $replyable;
    }

    public static function fromRequest(CreateReplyRequest $request): self{
        return new static ($request->body(), $request->author(), $request->replyAble());
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(): Reply
    {
        $reply = new Reply(['body' => $this->body]);
        $reply->authoredBy($this->author);
        $reply->to($this->replyable);
        $reply->save();

        return $reply;
    }
}
