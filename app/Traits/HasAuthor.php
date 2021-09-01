<?php

namespace App\Traits;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait HasAuthor{
    public function author(): User{
        return $this->authorRelation;
    }

    public function authoredBy(User $author){
        $this->authorRelation()->associate($author);
        /** @noinspection PhpUndefinedMethodInspection */
        $this->unsetRelation('authorRelation');
    }

    public function authorRelation(): BelongsTo{
        /** @noinspection PhpUndefinedMethodInspection */
        return $this->belongsTo(User::class, 'author_id');
    }

    public function isAuthoredBy(User $user):bool{
        /** @noinspection PhpUndefinedMethodInspection */
        return $this->author()->matches($user);
    }
}
