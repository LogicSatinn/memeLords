<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VideoClip extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = [
        'created_at', 'updated_at', 'deleted_at'
    ];

    public $fillable = [
        'clip_path', 'clipable_id', 'clipable_type'
    ];

    protected $casts = [
        'clip_path' => 'string',
        'clipable_id' => 'integer',
    ];


    public function clipable()
    {
        return $this->morphTo(__FUNCTION__, 'clipable_type', 'clipable_id');
    }
}
