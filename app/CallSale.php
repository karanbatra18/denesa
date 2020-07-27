<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CallSale extends Model
{
    protected $fillable = [
        'place',
        'address',
        'phone'
    ];
}
