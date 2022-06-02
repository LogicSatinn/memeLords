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

/**
 * App\Models\Topic
 *
 * @property int $id
 * @property string $name
 * @property string $category
 * @property string $visibility
 * @property int|null $created_by
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|\Spatie\MediaLibrary\MediaCollections\Models\Media[] $media
 * @property-read int|null $media_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Post[] $posts
 * @property-read int|null $posts_count
 * @method static \Illuminate\Database\Eloquent\Builder|Topic newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Topic newQuery()
 * @method static \Illuminate\Database\Query\Builder|Topic onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Topic query()
 * @method static \Illuminate\Database\Eloquent\Builder|Topic whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Topic whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Topic whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Topic whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Topic whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Topic whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Topic whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Topic whereVisibility($value)
 * @method static \Illuminate\Database\Query\Builder|Topic withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Topic withoutTrashed()
 * @mixin \Eloquent
 */
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
