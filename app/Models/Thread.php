<?php

namespace App\Models;

use App\Traits\HasAuthor;
use App\Traits\HasTags;
use App\Traits\ReceiveReplies;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Thread extends Model
{
    use HasFactory;
    use HasTags;
    use HasAuthor;
    use ReceiveReplies;

    protected $table = 'threads';

    protected $fillable = ['title', 'body', 'slug', 'channel_id', 'author_id'];

    protected $with = ['authorRelation', 'channel', 'tagsRelation'];


    public function channel(): BelongsTo{
        return $this->belongsTo(Channel::class);
    }

    public function excerpt(int $limit = 200): string{
        return Str::limit(strip_tags($this->body()),$limit);
    }

    public function title(): string{
        return $this->title;
    }

    public function body(): string{
        return $this->body;
    }

    public function slug():string{
        return $this->slug;
    }

    public function delete(){
        $this->removeTags();
        parent::delete();
    }

    public function scopeForTag(Builder $query, string $tag): Builder{
        return $query->whereHas('tagsRelation', function($query) use ($tag){
            $query->where('tags.slug', $tag);
        });
    }
}
