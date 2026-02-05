<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Amenities extends Model
{
    protected $fillable = ['title', 'slug', 'icon', 'image', 'status', 'parent_id'];

}
