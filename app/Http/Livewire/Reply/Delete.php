<?php

namespace App\Http\Livewire\Reply;

use App\Models\Reply;
use App\Policies\ReplyPolicy;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class Delete extends Component
{
    use AuthorizesRequests;
    public $replyId;
    public $page;

    public function mount($page){
        $this->page = $page;
    }

    /**
     * @throws AuthorizationException
     */
    public function deleteReply(){
        $reply = Reply::findOrFail($this->replyId);
        $this->authorize(ReplyPolicy::DELETE, $reply);
        $reply->delete();
        $this->emitUp('deleteReply', $this->page);
    }

    public function render()
    {
        return view('livewire.reply.delete');
    }
}
