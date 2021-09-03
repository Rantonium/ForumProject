<?php

namespace App\Http\Livewire\Notifications;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Component;

class Count extends Component
{
    public $count;

    public function render(): View
    {
        $this->count = Auth::user()->unreadNotifications()->count();
        return view('livewire.notifications.count', ['count' => $this->count,]);
    }
}
