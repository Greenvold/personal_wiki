<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    //
    public function scopeAssets()
    {
        return Teacher::scopeGuides()->union(Teacher::scopeCourses())->simplePaginate(6);
    }

    public function scopeGuides()
    {
        $search = request()->query('search');

        if ($search) {
            return Guide::where('title', 'LIKE', "%{$search}%")
                ->where('user_id', auth()->user()->id)
                ->orWhereHas('tags', function ($q) use ($search) {
                    $q->where('title', 'LIKE', "%{$search}%");
                })->where('user_id', auth()->user()->id);
        } else {
            return Guide::where('user_id', auth()->user()->id);
        }
    }

    public function scopeCourses()
    {
        $search = request()->query('search');

        if ($search) {
            return Course::where('title', 'LIKE', "%{$search}%")
                ->where('user_id', auth()->user()->id)
                ->orWhereHas('tags', function ($q) use ($search) {
                    $q->where('title', 'LIKE', "%{$search}%");
                })->where('user_id', auth()->user()->id);
        } else {
            return Course::where('user_id', auth()->user()->id);
        }
    }
}