<?php

namespace App\Jobs;

use App\Http\Requests\ThreadStoreRequest;
use App\Models\Thread;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Str;

class CreateThread implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $title, $body, $channel, $tags, $author;

    public function __construct(string $title, string $body, string $channel, array $tags, User $author)
    {
        $this->title    =$title;
        $this->body     =$body;
        $this->channel  =$channel;
        $this->tags     =$tags;
        $this->author   =$author;
    }

    public static function fromRequest(ThreadStoreRequest  $request):self{
        return new static ($request->title(),$request->body(), $request->channel(), $request->tags(), $request->author());
    }


    public function handle() :Thread
    {
        $thread = new Thread(['title' => $this->title, 'slug' => Str::slug($this->title), 'body' => $this->body, 'channel_id' => $this->channel]);
        $thread->authoredBy($this->author);
        $thread->syncTags($this->tags);
        $thread->save();

        return $thread;
    }
}
