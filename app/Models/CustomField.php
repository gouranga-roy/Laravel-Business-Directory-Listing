<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomField extends Model
{
    protected $fillable = ['label', 'field', 'multi_value_type', 'is_required', 'status', 'placeholder', 'listing_type'];

    protected $casts = [
        'multi_value_type' => 'array',
    ];

    public function types()
    {
        return $this->belongsTo(Type::class, 'listing_type');
    }
}
