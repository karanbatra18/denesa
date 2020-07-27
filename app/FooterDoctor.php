<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FooterDoctor extends Model
{
    protected $fillable = [
        'name',
        'link',
        'place'
    ];
}
