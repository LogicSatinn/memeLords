<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Post extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia;

    protected $fillable = [
        'title', 'user_id', 'topic_id', 'visibility'
    ];

    protected $casts = [
        'title' => 'string',
        'user_id' => 'integer',
        'topic_id' => 'integer',
        'visibility' => 'string'
    ];


    public function topic(): BelongsTo
    {
        return $this->belongsTo(Topic::class);
    }


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('post')
            ->singleFile();
    }
}
