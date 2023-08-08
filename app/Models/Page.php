<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'text_content',
        'featured_image',
    ];

    public function getFeaturedImageUrlAttribute()
    {
    if ($this->featured_image) {
        return asset('storage/' . $this->featured_image);
    }
    return null;
    }

    
}
