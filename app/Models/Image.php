<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'image_path', 'imageable_type', 'imageable_id'
    ];

    protected $casts = [
        'image_path' => 'string',
        'imageable_id' => 'integer'
    ];

    public function imageable()
    {
        return $this->morphTo();
    }
}
