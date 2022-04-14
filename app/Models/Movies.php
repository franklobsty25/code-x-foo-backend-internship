<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movies extends Model
{
    use HasFactory;

    protected $fillable = [
        'media_type',
        'name',
        'short_name',
        'long_description',
        'short_description',
        'created_at',
        'updated_at',
        'review_url',
        'review_score',
        'slug',
        'genres',
        'created_by',
        'published_by',
        'franchises',
        'regions',
    ];
}
