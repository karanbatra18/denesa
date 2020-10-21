<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Doctor extends Model
{
    use SoftDeletes, Sluggable;

    protected $fillable = [
        'hospital_id',
        'category_id',
        'name',
        'designation'.
        'experience',
        'qualification',
        'speciality',
        'about',
        'specialization',
        'list_of_awards',
        'work_experience',
        'education_training',
        'state',
        'city',
        'location',
        'zip_code',
        'image',
        'slug',
        'meta_title',
        'meta_description'
    ];

    /**
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function hospital()
    {
        return $this->belongsTo('App\Hospital');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

}
