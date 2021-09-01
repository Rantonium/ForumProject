<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Channel;
use App\Models\Tag;
use App\Models\Thread;
use Illuminate\Http\Request;

class ThreadController extends Controller
{

    public function __construct(){
        return $this->middleware(['auth', 'verified'])->except(['index','show']);
    }

    public function index()
    {
        /** @noinspection PhpUndefinedMethodInspection */
        return view('threads.index', ['threads' => Thread::paginate(5),]);
    }

    public function create()
    {
        return view('threads.create', ['channels' => Channel::all(), 'tags' => Tag::all()]);
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Channel $channel, Thread $thread)
    {
        return view('threads.show', compact('thread','channel'));
    }


    public function edit(Thread $thread)
    {
        //
    }

    public function update(Request $request, Thread $thread)
    {
        //
    }

    public function destroy(Thread $thread)
    {
        //
    }
}
