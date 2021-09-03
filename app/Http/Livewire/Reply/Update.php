<?php

namespace App\Http\Livewire\Reply;

use App\Models\Reply;
use App\Policies\ReplyPolicy;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\RedirectResponse;
use Livewire\Component;

class Update extends Component
{
    use AuthorizesRequests;
    public $replyId;
    public $replyOldBody;
    public $replyNewBody;
    public $author;
    public $createdAt;

    protected $listeners = ['deleteReply'];

    /**
     * @throws AuthorizationException
     */
    public function update(){
        $reply = Reply::findOrFail($this->replyId);
        $this->authorize(ReplyPolicy::UPDATE, $reply);
        $reply->body = $this->replyNewBody;
        $reply->save();
        session()->flash('success', 'Reply Updated');
        $this->initialize($reply);

    }

    public function initialize(Reply $reply){
        $this->replyOldBody = $reply->body();
        $this->replyNewBody = $this->replyOldBody;
    }

    public function mount(Reply $reply){
        $this->replyId = $reply->id();
        $this->replyOldBody = $reply->body();
        $this->author = $reply->author();
        $this->createdAt = $reply->created_at;
        // as soon as we update the old body too
        $this->initialize($reply);
    }

    /** @noinspection PhpMissingReturnTypeInspection */
    public function deleteReply($page)
    {
        session()->flash('success', 'Reply Deleted');
        return redirect()->to($page);
    }

    public function render()
    {
        return view('livewire.reply.update');
    }
}
