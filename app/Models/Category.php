<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Category extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia;

    protected $fillable = [
        'name'
    ];

    protected $casts = [
        'name' => 'string',
        'id' => 'integer'
    ];


    public function topics(): BelongsToMany
    {
        return $this->belongsToMany(Topic::class);
    }


    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('categories')
            ->singleFile();
    }
}
