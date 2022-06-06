<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 * App\Models\Topic
 *
 * @property int $id
 * @property string $name
 * @property string $category
 * @property string $visibility
 * @property int|null $created_by
 * @property Carbon|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read MediaCollection|Media[] $media
 * @property-read int|null $media_count
 * @property-read Collection|\App\Models\Post[] $posts
 * @property-read int|null $posts_count
 * @method static Builder|Topic newModelQuery()
 * @method static Builder|Topic newQuery()
 * @method static \Illuminate\Database\Query\Builder|Topic onlyTrashed()
 * @method static Builder|Topic query()
 * @method static Builder|Topic whereCategory($value)
 * @method static Builder|Topic whereCreatedAt($value)
 * @method static Builder|Topic whereCreatedBy($value)
 * @method static Builder|Topic whereDeletedAt($value)
 * @method static Builder|Topic whereId($value)
 * @method static Builder|Topic whereName($value)
 * @method static Builder|Topic whereUpdatedAt($value)
 * @method static Builder|Topic whereVisibility($value)
 * @method static \Illuminate\Database\Query\Builder|Topic withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Topic withoutTrashed()
 * @mixin \Eloquent
 * @property-read Collection|\App\Models\Category[] $categories
 * @property-read int|null $categories_count
 * @property-read \App\Models\User|null $owner
 * @property-read Collection|\App\Models\User[] $users
 * @property-read int|null $users_count
 */
class Topic extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia;

    protected $dates = [
        'created_at', 'deleted_at', 'updated_at'
    ];


    protected $fillable = [
        'name', 'visibility', 'description'
    ];


    protected $casts = [
        'name' => 'string',
        'visibility' => 'string',
        'description' => 'string'
    ];


    public function name(): Attribute
    {
        return Attribute::make(
            get: fn($value) => '#' . Str::camel($value),
        );
    }


    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }


    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }


    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }


    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('topics')
            ->singleFile();
    }

}
