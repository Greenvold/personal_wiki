<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;

class Episode extends Model
{
    //
    use Sluggable;

    protected $fillable = ['title', 'short_description', 'video', 'order_number', 'course_id'];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}