<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateReplyRequest;
use App\Models\Reply;
use App\Policies\ReplyPolicy;
use Illuminate\Http\Request;

class ReplyController extends Controller
{
    public function __construct(){
        return $this->middleware(['auth', 'verified']);
    }

    public function store(CreateReplyRequest $request){
        $this->authorize(ReplyPolicy::CREATE, Reply::class);
        $this->dispatchSync(CreateReply::fromRequest($request));
    }
}
