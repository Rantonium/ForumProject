<?php

namespace App\Models;

use App\Traits\HasAuthor;
use App\Traits\HasTags;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Thread extends Model
{
    use HasFactory;
    use HasTags;
    use HasAuthor;

    protected $fillable = ['subject', 'body', 'channel_id', 'author_id'];

    protected $with = ['authorRelation', 'channels', 'tagsRelation'];


    public function channel(): BelongsTo{
        return $this->belongsTo(Channel::class);
    }

    public function delete(){
        $this->removeTags();
        parent::delete();
    }
}
