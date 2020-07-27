<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FeaturedTreatment extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'link',
        'description',
        'featured_image',
        'icon_image'
    ];
}
