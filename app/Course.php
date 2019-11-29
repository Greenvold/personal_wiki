<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Tag;
use App\User;

class Course extends Model
{
    use SoftDeletes;
    use Sluggable;
    //
    protected $fillable = ['title', 'content', 'published_at', 'image', 'user_id', 'short_description', 'user_id', 'episode_id', 'course_id'];
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

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getPublishedAtAttribute($value)
    {
        return date('d/m/Y', strtotime($this->attributes['published_at']));
    }

    public function setPublishedAtAttribute($value)
    {
        $this->attributes['published_at'] = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
    }

    public function author()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function hasTag($tag)
    {
        return in_array($tag, $this->tags->pluck('title')->toArray());
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function likedByuser($id)
    {
        return Like::where('likeable_type', 'App\Course')->where('likeable_id', $id)->where('user_id', auth()->user()->id)->exists();
    }

    public function disLikedByuser($id)
    {
        return Dislike::where('dislikeable_type', 'App\Course')->where('dislikeable_id', $id)->where('user_id', auth()->user()->id)->exists();
    }


    public function scopeTag($tags)
    {
        return Course::whereHas('tags', function ($q) use ($tags) {
            $q->whereIn('title', $tags);
        });
    }

    public function recent()
    {
        return $this->morphOne('App\Recent', 'recentable');
    }

    public function episodes()
    {
        return $this->belongsToMany(Episode::class);
    }
}