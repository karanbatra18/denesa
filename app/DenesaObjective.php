<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DenesaObjective extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'description'
    ];
}
