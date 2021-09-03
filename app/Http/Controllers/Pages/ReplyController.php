<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateReplyRequest;
use App\Jobs\CreateReply;
use App\Models\Reply;
use App\Policies\ReplyPolicy;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\RedirectResponse;

class ReplyController extends Controller
{
    public function __construct(){
        return $this->middleware(['auth', 'verified']);
    }

    /**
     * @throws AuthorizationException
     */
    public function store(CreateReplyRequest $request): RedirectResponse
    {
        $this->authorize(ReplyPolicy::CREATE, Reply::class);
        $this->dispatchSync(CreateReply::fromRequest($request));
        return back()->with('success', 'Reply Added');
    }
}
