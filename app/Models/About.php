<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $table = 'about';
    
    protected $fillable = [
        'title',
        'subtitle',
        'bio',
        'experience_years',
        'specialization',
        'image_path'
    ];
    
    protected $casts = [
        'experience_years' => 'integer'
    ];
}