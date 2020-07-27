<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = [
        'banner_page_label',
        'banner_page',
        'featured_image'
    ];
}
