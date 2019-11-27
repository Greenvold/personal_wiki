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
    protected $fillable = ['title', 'content', 'published_at', 'image', 'user_id', 'short_description'];
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

    public function scopeMyGuides()
    {
        return Course::whereHas('users', function ($q) {
            $q->where('user_id', auth()->user()->id);
        })->paginate(4);
    }

    public function scopeMyGuidesSearched($query)
    {
        $search = request()->query('search');

        if ($search) {
            return Course::where('title', 'LIKE', "%{$search}%")
                ->whereHas('users', function ($q) {
                    $q->where('user_id', auth()->user()->id);
                })
                ->orWhereHas('tags', function ($q) use ($search) {
                    $q->where('title', 'LIKE', "%{$search}%");
                })
                ->whereHas('users', function ($q) {
                    $q->where('user_id', auth()->user()->id);
                })->paginate(6);
        } else {
            return Course::whereHas('users', function ($q) {
                $q->where('user_id', auth()->user()->id);
            })->paginate(6);
        }
    }

    public function likedByuser($id)
    {
        return Like::where('likeable_type', 'App\Course')->where('likeable_id', $id)->where('user_id', auth()->user()->id)->exists();
    }

    public function disLikedByuser($id)
    {
        return Dislike::where('dislikeable_type', 'App\Course')->where('dislikeable_id', $id)->where('user_id', auth()->user()->id)->exists();
    }

    public function scopeSearched($query)
    {
        $search = request()->query('search');

        if ($search) {
            return Course::where('title', 'LIKE', "%{$search}%")
                ->orWhereHas('tags', function ($q) use ($search) {
                    $q->where('title', 'LIKE', "%{$search}%");
                })->simplePaginate(4);
        } else {
            return Course::orderBy('published_at', 'desc')->simplePaginate(4);
        }
    }

    //Teacher section

    public function scopeTeacherCourses($query)
    {
        $search = request()->query('search');

        if ($search) {
            return Course::where('title', 'LIKE', "%{$search}%")
                ->where('user_id', auth()->user()->id)
                ->orWhereHas('tags', function ($q) use ($search) {
                    $q->where('title', 'LIKE', "%{$search}%");
                })->where('user_id', auth()->user()->id)->simplePaginate(6);
        } else {
            return Course::where('user_id', auth()->user()->id)->simplePaginate(6);
        }
    }

    public function scopeWeb()
    {
        return Course::whereHas('tags', function ($q) {
            $q->where('title', 'Front-end')->orWhere('title', 'Back-end');
        });
    }

    public function scopeOffice()
    {
        return Course::whereHas('tags', function ($q) {
            $q->where('title', 'Microsoft Office')->orWhere('title', 'MS Excel')->orWhere('title', 'MS Word')->orWhere('title', 'Microsoft Office Excel')->orWhere('title', 'MS Excel');
        });
    }

    public function recent()
    {
        return $this->morphOne('App\Recent', 'recentable');
    }

    public function scopeTeacherCoursesNoPaginate($query)
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