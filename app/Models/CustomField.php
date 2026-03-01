<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomField extends Model
{
    protected $fillable = ['label', 'field', 'is_required', 'status', 'placeholder', 'listing_type'];
}
