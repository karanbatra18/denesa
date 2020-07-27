<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Topic extends Model
{
    use SoftDeletes, Sluggable;

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'type',
        'is_active'
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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function knowledgeCenters()
    {
        return $this->belongsToMany(KnowledgeCenter::class);
    }
}
