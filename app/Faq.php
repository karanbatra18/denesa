<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'title',
        'description'
    ];
}
