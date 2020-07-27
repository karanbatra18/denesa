<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DenesaService extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'featured_image'
    ];
}
