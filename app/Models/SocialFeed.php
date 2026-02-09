<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialFeed extends Model
{
    protected $fillable = [
        'platform',
        'content',
        'image_url',
        'post_url',
        'posted_at'
    ];
    
    protected $casts = [
        'posted_at' => 'datetime'
    ];
}