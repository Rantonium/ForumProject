<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use App\Traits\HasTimeStamps;


class Tag extends Model
{
    use HasFactory;
    use HasTimeStamps;

    protected $table = 'tags';

    protected $fillable = ['name', 'slug'];

    public function threads(): MorphToMany
    {
        return $this->morphedByMany(Thread::class, 'taggable');
    }

    public function id(){
        return $this->id;
    }

    public function name(){
        return $this->name;
    }

    public function slug(){
        return $this->slug;
    }
}
