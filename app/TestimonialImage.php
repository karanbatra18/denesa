<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TestimonialImage extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'featured_image',
        'testimonial_id'
    ];

    public function testimonial()
    {
        return $this->belongsToMany(Testimonial::class);
    }

}
