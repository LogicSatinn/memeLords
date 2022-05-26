<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = [
        'created_at', 'updated_at', 'deleted_at'
    ];

    public $fillable = [
        'image_path', 'imageable_id', 'imageable_type'
    ];

    protected $casts = [
        'image_path' => 'string',
        'imageable_id' => 'integer',
    ];


    public function imageable(): MorphTo
    {
        return $this->morphTo();
    }
}
