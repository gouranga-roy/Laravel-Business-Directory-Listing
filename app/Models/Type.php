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
}
