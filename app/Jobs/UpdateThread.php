<?php

namespace App\Jobs;

use App\Http\Requests\ThreadStoreRequest;
use App\Models\Thread;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Mews\Purifier\Facades\Purifier;

class UpdateThread implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $thread, $attributes;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Thread $thread, array $attributes = [])
    {
        $this->thread = $thread;
        $this->attributes = Arr::only($attributes, ['title','slug', 'body', 'channel_id', 'tags']);
    }


    public static function fromRequest(Thread $thread, ThreadStoreRequest $request): self{
        return new static($thread, [
            'title' => $request->title(),
            'body' => Purifier::clean($request->body()),
            'channel_id' => $request->channel(),
            'slug' => Str::slug($request->title()),
            'tags'=>$request->tags()]);
    }

    public function handle()
    {
        $this->thread->update($this->attributes);
        if(Arr::has($this->attributes, 'tags')){
            $this->thread->syncTags($this->attributes['tags']);
        }
        $this->thread->save();

        return $this->thread;
    }
}
