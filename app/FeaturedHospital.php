<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FeaturedHospital extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'featured_image',
        'link'
    ];
}
