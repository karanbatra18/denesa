<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UniqueService extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'description'
    ];
}
