<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['name', 'email', 'phone', 'city', 'zip', 'direction', 'website', 'address', 'notes', 'photo', 'facebook', 'twitter', 'instagram', 'linkedin'];
}
