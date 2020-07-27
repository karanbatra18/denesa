<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FooterHospital extends Model
{
    protected $fillable = [
        'name',
        'link',
        'place'
    ];
}
