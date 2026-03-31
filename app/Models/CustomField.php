<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomField extends Model
{
    protected $fillable = ['label', 'field', 'options', 'is_required', 'status', 'placeholder', 'listing_type'];

    protected $casts = [
        'options' => 'array',
    ];

    public function type()
    {
        return $this->belongsTo(Type::class, 'listing_type');
    }
}
