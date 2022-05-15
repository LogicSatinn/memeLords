<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title', 'postable_type', 'postable_id'
    ];

    protected $casts = [
        'title' => 'string',
        'postable_id' => 'integer'
    ];


    public function postable(): MorphTo
    {
        return $this->morphTo();
    }


    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
