<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Notifications\DatabaseNotification;

class NotificationPolicy
{
    use HandlesAuthorization;
    const MARK_AS_READ = 'markAsRead';

    public function markAsRead(User $user, DatabaseNotification $notification): bool{
        // check if user is authorized to check the notification
        return $notification->notifiable()->is($user);
    }
}
