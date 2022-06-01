<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Topic extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia;

    protected $dates = [
        'created_at', 'deleted_at', 'updated_at'
    ];


    protected $fillable = [
        'name', 'category', 'visibility', 'description'
    ];


    protected $casts = [
        'name' => 'string',
        'category' => 'string',
        'visibility' => 'string',
        'description' => 'string'
    ];


    public function name(): Attribute
    {
        return Attribute::make(
            get: fn($value) => ucwords($value),
            set: fn($value) => Str::snake($value),
        );
    }


    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }


    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('topics')
            ->singleFile();
    }

}
