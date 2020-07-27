<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FooterIntroduction extends Model
{
    protected $fillable = [
        'description',
        'address',
        'phone',
        'email1',
        'email2',
        'email3',
        'hospital_heading',
        'doctor_heading',
        'service_heading'
    ];
}
