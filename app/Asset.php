<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    //
    public function scopeSearched($query)
    {
        $search = request()->query('search');

        if ($search) {
            $guides = Guide::where('title', 'LIKE', "%{$search}%")
                ->orWhereHas('tags', function ($q) use ($search) {
                    $q->where('title', 'LIKE', "%{$search}%");
                });

            $courses = Course::where('title', 'LIKE', "%{$search}%")
                ->orWhereHas('tags', function ($q) use ($search) {
                    $q->where('title', 'LIKE', "%{$search}%");
                });

            return $guides->union($courses)->simplePaginate(4);
        } else {

            $guides = Guide::orderBy('published_at', 'desc')->take(4);

            $courses = Course::orderBy('published_at', 'desc')->take(4);

            return $guides->union($courses)->simplePaginate(4);
        }
    }

    public function scopeTags($query, $tags)
    {
        $courses = Course::whereHas('tags', function ($q) use ($tags) {
            $q->whereIn('title', $tags);
        })->orderBy('published_at', 'desc');

        $guides =  Guide::whereHas('tags', function ($q) use ($tags) {
            $q->whereIn('title', $tags);
        })->orderBy('published_at', 'desc');

        return $courses->union($guides)->simplePaginate(4);
    }

    public function scopeRecentlyAdded($query)
    {
        $guides = Guide::orderBy('published_at', 'desc')->take(4);

        $courses = Course::orderBy('published_at', 'desc')->take(4);

        return $courses->union($guides)->simplePaginate(4);
    }
}