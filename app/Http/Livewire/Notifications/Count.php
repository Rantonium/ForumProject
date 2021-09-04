<?php

namespace App\Http\Livewire\Notifications;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Component;

class Count extends Component
{
    public $count;

    protected $listeners = [ 'markedAsRead' => 'updateCount'];

    public function updateCount(int $count): int{
        return $count;
    }

    public function render(): View
    {
        $this->count = Auth::user()->unreadNotifications()->count();
        return view('livewire.notifications.count', ['count' => $this->count,]);
    }
}
