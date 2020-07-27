<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialLink extends Model
{
    protected $fillable = [
        'facebook_url',
        'twitter_url',
        'linkedin_url',
        'instagram_url',
        'copyright_text'
    ];
}
