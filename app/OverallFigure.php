<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OverallFigure extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'total_count',
        'featured_image'
    ];
}
