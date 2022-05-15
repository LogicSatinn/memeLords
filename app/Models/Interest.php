<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Interest extends Model
{
    use HasFactory, SoftDeletes;


    public function posts(): MorphMany
    {
        return $this->morphMany(Post::class, 'postable');
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
