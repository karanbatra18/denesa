<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TopDoctor extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'link',
        'designation',
        'featured_image'
    ];
}
