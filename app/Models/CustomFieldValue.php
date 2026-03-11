<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomFieldValue extends Model
{
    protected $fillable = [
        'reference_type', 'reference_id', 'data',
    ];
    protected $casts = [
        'data' => 'array',
    ];

    public function directory()
    {
        return $this->hasMany(DirectoryList::class);
    }

}
