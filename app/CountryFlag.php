<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CountryFlag extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'featured_image'
    ];
}
