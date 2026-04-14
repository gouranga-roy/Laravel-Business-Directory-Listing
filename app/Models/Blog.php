<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = ['title', 'slug', 'category_id', 'image', 'description', 'popular', 'is_published', 'keywords', 'seo_title', 'seo_description'];

    protected $casts = [
        'keywords' => 'array',
    ];

    public function categories()
    {
        return $this->belongsTo(BlogCategory::class, 'category_id', 'id');
    }

}
