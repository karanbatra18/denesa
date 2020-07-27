<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AboutIntroduction extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'description'
    ];
}
