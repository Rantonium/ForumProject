<?php

namespace App\Http\Livewire\Notifications;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Component;

class Indicator extends Component
{
    public $hasNotifications;

    public function render(): View
    {
        $this->hasNotifications = $this->setHasNotifications(Auth::user()->unreadNotifications()->count());
        return view('livewire.notifications.indicator', ['hasNotifications' => $this->hasNotifications,]);
    }

    public function setHasNotifications(int $count):bool{
        return $count > 0;
    }
}
