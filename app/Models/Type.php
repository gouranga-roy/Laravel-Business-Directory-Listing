<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $fillable = ['name', 'slug', 'logo', 'image', 'status'];

    public $hasFile = ['logo', 'image'];

    public function listingAmenities()
    {
        return $this->hasMany(ListingAmenity::class, 'type_id');
    }

    public function field()
    {
        return $this->hasMany(CustomField::class);
    }

    public function categories()
    {
        return $this->hasMany(Category::class, 'type_id', 'id');
    }

    public function directories()
    {
        return $this->hasManyThrough(
            DirectoryList::class,
            Category::class,
            'type_id',
            'category_id',
            'id',
            'id',
        );
    }
}
