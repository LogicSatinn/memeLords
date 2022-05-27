<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Post extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia;

    protected $fillable = [
        'title', 'postable_type', 'postable_id', 'visibility'
    ];

    protected $casts = [
        'title' => 'string',
        'postable_id' => 'integer'
    ];


    public function postable(): MorphTo
    {
        return $this->morphTo();
    }


    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('post')
            ->singleFile();
    }
}
