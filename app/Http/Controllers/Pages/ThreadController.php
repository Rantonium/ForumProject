<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Http\Requests\ThreadStoreRequest;
use App\Jobs\CreateThread;
use App\Jobs\UpdateThread;
use App\Models\Channel;
use App\Models\Tag;
use App\Models\Thread;
use App\Policies\ThreadPolicy;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\RedirectResponse;

class ThreadController extends Controller
{

    public function __construct(){
        return $this->middleware(['auth', 'verified'])->except(['index','show']);
    }

    public function index()
    {
        // order by to show the newest threads
        /** @noinspection PhpUndefinedMethodInspection */
        return view('threads.index', ['threads' => Thread::orderBy('created_at','desc')->paginate(5),]);
    }

    public function create()
    {
        return view('threads.create', ['channels' => Channel::all(), 'tags' => Tag::all()]);
    }

    public function store(ThreadStoreRequest $request): RedirectResponse
    {
        $this->dispatchSync(CreateThread::fromRequest($request));

        return redirect()->route('threads.index')->with('success', 'Thread Created');
    }

    public function show(Channel $channel, Thread $thread)
    {
        return view('threads.show', compact('thread','channel'));
    }


    /**
     * @throws AuthorizationException
     */
    public function edit(Thread $thread)
    {
        $this->authorize(ThreadPolicy::UPDATE, $thread);
        $previousTags = $thread->tags()->pluck('id')->toArray();
        $selectedChannel = $thread->channel;
        return view('threads.edit', ['thread' => $thread, 'tags' => Tag::all(), 'previousTags' => $previousTags, 'channels' => Channel::all(), 'selectedChannel' => $selectedChannel]);
    }

    /**
     * @throws AuthorizationException
     * @noinspection PhpMissingReturnTypeInspection
     */
    public function update(ThreadStoreRequest $request, Thread $thread)
    {
        $this->authorize(ThreadPolicy::UPDATE, $thread);
        $this->dispatchSync(UpdateThread::fromRequest($thread, $request));
        return redirect()->route('threads.index')->with('success', 'Thread Updated');
    }

    public function destroy(Thread $thread)
    {
        //
    }
}
