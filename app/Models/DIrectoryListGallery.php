<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DirectoryListGallery extends Model
{
    public $table = 'directory_list_galleries';

    protected $fillable = [
        'listing_id', 'path',
    ];

    protected $casts = [
        'path' => 'array',
    ];
}
