<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SiteModule extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name'
    ];
}
