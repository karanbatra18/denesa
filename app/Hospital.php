<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hospital extends Model
{
   	use SoftDeletes, Sluggable;

   	protected $fillable = [
   	    'name',
   	    'description',
   	    'team_specialities',
   	    'speciality',
   	    'established',
   	    'infrastructure',
   	    'address',
   	    'image',
   	    'featured_image',
   	    'state',
   	    'city',
   	    'zip_code',
   	    'slug',
   	    'confirm_during_stay',
   	    'money_matters',
   	    'food',
   	    'treatment_related',
   	    'languauge',
   	    'transportation',
        'meta_title',
        'meta_description',
        'is_featured'

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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
   	public function doctors()
   	{
   		return $this->hasMany('App\Doctor');
   	}
}
