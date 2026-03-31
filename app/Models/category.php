<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['title', 'slug', 'parent_id', 'type_id', 'icon', 'image'];

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id', 'id');
    }

    public function directory()
    {
        return $this->hasMany(DirectoryList::class, 'category_id', 'id');
    }

}
