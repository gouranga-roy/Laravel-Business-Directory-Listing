<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DirectoryList extends Model
{
    protected $fillable = [
        'listing_id',
        'category_id',
        'title',
        'slug',
        'content_type',
        'description',
        'latitude',
        'longitude',
        'country_id',
        'address',
        'postal_code',
        'thumbnail',
        'agent_name',
        'agent_email',
        'agent_phone',
        'order',
        'status',
    ];

    protected $casts = [
        'data' => 'array',
    ];

    public function listing()
    {
        return $this->belongsTo(DirectoryList::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function type()
    {
        return $this->hasOneThrough(
            Type::class,
            Category::class,
            'id',
            'id',
            'category_id',
            'type_id'
        );
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }

    public function customField()
    {
        return $this->belongsTo(CustomField::class, 'reference_id', 'id');
    }

    public function custom()
    {
        return $this->morphOne(CustomFieldValue::class, 'reference');
    }

    public function gallery()
    {
        return $this->hasMany(DirectoryListGallery::class, 'listing_id', 'id');
    }
}
