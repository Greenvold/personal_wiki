<?php

namespace App;

use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Asset extends Model
{
    //
    use SoftDeletes;
    use Sluggable;

    protected $fillable = ['title', 'content', 'published_at', 'image', 'user_id', 'short_description', 'type'];

    protected $with = ['author'];

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

    public function episodes()
    {
        return $this->belongsToMany(Episode::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
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

    public function recent()
    {
        return $this->morphOne(Recent::class, 'recentable');
    }

    public function questions()
    {
        return $this->morphMany(Question::class, 'questionable');
    }

    public function votes()
    {
        return $this->morphMany(Vote::class, 'voteable');
    }

    public function downVotes()
    {
        return $this->morphMany(Vote::class, 'voteable')->where('type', 'down');
    }

    public function upVotes()
    {
        return $this->morphMany(Vote::class, 'voteable')->where('type', 'up');
    }

    //maybe not needed
    public function hasTag($tag)
    {
        return in_array($tag, $this->tags->pluck('title')->toArray());
    }

    public function isEnrolled()
    {
        return $this->users()->where('user_id', auth()->user()->id)->exists();
    }

    public function scopeBelongsToTag($query, $tags)
    {
        return $this->whereHas('tags', function ($q) use ($tags) {
            $q->whereIn('title', $tags);
        })->orderBy('published_at', 'desc')->paginate(4);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    //OLD SHIT
    // public function scopeSearched($query)
    // {
    //     $search = request()->query('search');

    //     if ($search) {
    //         $guides = Guide::where('title', 'LIKE', "%{$search}%")
    //             ->orWhereHas('tags', function ($q) use ($search) {
    //                 $q->where('title', 'LIKE', "%{$search}%");
    //             });

    //         $courses = Course::where('title', 'LIKE', "%{$search}%")
    //             ->orWhereHas('tags', function ($q) use ($search) {
    //                 $q->where('title', 'LIKE', "%{$search}%");
    //             });

    //         return $guides->union($courses)->simplePaginate(2);
    //     } else {

    //         $guides = Guide::orderBy('published_at', 'desc')->take(4);

    //         $courses = Course::orderBy('published_at', 'desc')->take(4);

    //         return $guides->union($courses)->simplePaginate(2);
    //     }
    // }

    // public function scopeSearchedv($query)
    // {
    //     $search = request()->query('search');

    //     if ($search) {
    //         $guides = Guide::where('title', 'LIKE', "%{$search}%")
    //             ->orWhereHas('tags', function ($q) use ($search) {
    //                 $q->where('title', 'LIKE', "%{$search}%");
    //             });

    //         $courses = Course::where('title', 'LIKE', "%{$search}%")
    //             ->orWhereHas('tags', function ($q) use ($search) {
    //                 $q->where('title', 'LIKE', "%{$search}%");
    //             })->get();

    //         return $guides->union($courses);
    //     } else {

    //         $guides = Guide::orderBy('published_at', 'desc')->take(4);

    //         $courses = Course::orderBy('published_at', 'desc')->take(4);

    //         return $guides->union($courses)->get();
    //     }
    // }

    // public function scopeTagsSearch($query, $tags)
    // {
    //     $courses = Course::whereHas('tags', function ($q) use ($tags) {
    //         $q->whereIn('title', $tags);
    //     })->orderBy('published_at', 'desc')->with('tags');



    //     $guides =  Guide::whereHas('tags', function ($q) use ($tags) {
    //         $q->whereIn('title', $tags);
    //     })->orderBy('published_at', 'desc')->with('tags');

    //     dd($guides->get());
    //     return $courses->union($guides)->simplePaginate(4);
    // }

    // public function scopeRecentlyAdded($query)
    // {
    //     $guides = Guide::orderBy('published_at', 'desc')->take(4);

    //     $courses = Course::orderBy('published_at', 'desc')->take(4);

    //     return $courses->union($guides)->simplePaginate(4);
    // }
}