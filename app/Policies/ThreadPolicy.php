<?php

namespace App\Policies;

use App\Models\Thread;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ThreadPolicy
{
    const UPDATE = 'update';
    const DELETE = 'delete';

    public function update(User $user, Thread $thread): bool{
        return $thread->isAuthoredBy($user) || $user->isAdmin();
    }

    public function delete(User $user, Thread $thread): bool{
        return $thread->isAuthoredBy($user) || $user->isAdmin();
    }

}
