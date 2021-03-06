<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Channel extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    public function threads():HasMany{
        return $this->hasMany(Thread::class);
    }

    public function name():string{
        return $this->name;
    }

    public function slug():string{
        return $this->slug;
    }

    public function id():string{
        return $this->id;
    }

}
