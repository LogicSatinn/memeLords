<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Interest extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia;


    public function posts(): MorphMany
    {
        return $this->morphMany(Post::class, 'postable');
    }


    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }


    public function clip()
    {
        return $this->morphOne(Clip::class, 'clipable');
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('posts')
            ->singleFile();
    }

}
