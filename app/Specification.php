<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specification extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'title',
        'description'
    ];
}
