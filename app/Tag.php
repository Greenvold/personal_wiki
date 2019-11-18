<?php

namespace App;

use App\Guide;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Tag extends Model
{
    //
    use Sluggable;

    protected $fillable = ['title'];
    /**
     * Return the sluggable configuration array for this model.
     *
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

    public function guides()
    {
        return $this->belongsToMany(Guide::class);
    }
}