<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Introduction extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'description'
    ];
}
