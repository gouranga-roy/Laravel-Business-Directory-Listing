<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ListingAmenity extends Model
{
    protected $fillable = ['type_id', 'amenities_id'];

    public function amenities()
    {
        return $this->belongsTo(Amenities::class, 'amenities_id');
    }

    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id');
    }
}
