<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Treatment extends Model
{

    use SoftDeletes, Sluggable;

    protected $fillable = [
        'title',
        'slug',
        'transplant_price',
        'travellers_count',
        'hospital_days_count',
        'days_outside_count',
        'total_days_count',
        'introduction',
        'cost',
        'featured_image',
        'category_id',
    ];

    /**
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function hospitals()
    {
    	return $this->belongsToMany('App\Hospital', 'hospital_treatment');
    }

    public function doctors()
    {
    	return $this->belongsToMany('App\Doctor', 'doctor_treatment');
    }

    public function specifications()
    {
        return $this->hasMany('App\Specification');
    }


    public function faqs()
    {
        return $this->hasMany('App\Faq');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
