<?php

namespace App\Http\Livewire\Thread;

use App\Policies\ThreadPolicy;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\RedirectResponse;
use Livewire\Component;

class Delete extends Component
{
    public $thread;
    public $confirmingThreadDeletion = false;
    use AuthorizesRequests;

    public function confirmThreadDeletion(){
        $this->resetErrorBag();
        $this->dispatchBrowserEvent('confirming-delete-thread');
        $this->confirmingThreadDeletion = true;
    }

    /**
     * @throws AuthorizationException
     * @noinspection PhpMissingReturnTypeInspection
     */
    public function deleteThread()
    {
        $this->authorize(ThreadPolicy::DELETE, $this->thread);
        $this->thread->delete();
        session()->flash('success', 'Thread Deleted');
        return redirect()->route('threads.index');
    }

    public function render()
    {
        return view('livewire.thread.delete');
    }
}
