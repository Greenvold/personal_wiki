<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Guide;
use App\Group;
use App\DB;
use Illuminate\Support\Facades\DB as IlluminateDB;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function guides()
    {
        return $this->belongsToMany(Guide::class);
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }

    public function groups()
    {
        return $this->belongsToMany(Group::class);
    }

    public function isAdmin()
    {
        return in_array('Admin', $this->groups->pluck('title')->toArray());
    }

    public function hasGroup($group)
    {
        if (auth()->user()->isAdmin()) {
            return true;
        }
        return in_array($group, $this->groups->pluck('title')->toArray());
    }

    public function scopeRecents()
    {
        $recentViewedGuides = Guide::whereIn(
            'id',
            Recent::select('recentable_id')->where('user_id', auth()->user()->id)->where('recentable_type', 'App\Guide')->orderBy('updated_at', 'desc')->take(1)->get()
        )->get();

        $recentViewedCourses = Course::whereIn(
            'id',
            Recent::select('recentable_id')->where('user_id', auth()->user()->id)->where('recentable_type', 'App\Course')->orderBy('updated_at', 'desc')->take(1)->get()
        )->get();

        return $recentViewedCourses->merge($recentViewedGuides);
    }

    public function scopeMyAssets($query)
    {
        $search = request()->query('search');

        if ($search) {

            $guides = auth()->user()->guides()->where('title', 'LIKE', "%{$search}%")->orWhereHas('tags', function ($q) use ($search) {
                $q->where('title', 'LIKE', "%{$search}%");
            });

            $courses = auth()->user()->courses()->where('title', 'LIKE', "%{$search}%")->orWhereHas('tags', function ($q) use ($search) {
                $q->where('title', 'LIKE', "%{$search}%");
            });

            return $courses->union($guides)->simplePaginate(6);
        } else {
            $guides =  auth()->user()->guides();

            $courses =   auth()->user()->courses();

            return $guides->union($courses)->simplePaginate(6);
        }
    }

    public function coursesViewed()
    {
        return $this->belongsToMany(Course::class, 'course_episode_user');
    }

    public function episode()
    {
        return $this->belongsToMany(Episode::class, 'course_episode_user');
    }
    public function lastViewedEpisode($courseId)
    {
        $lastEpisodeId = IlluminateDB::table('course_episode_user')->select('episode_id')->where('course_id', $courseId)->where('user_id', auth()->user()->id)->first()->episode_id;

        return Episode::where('id', $lastEpisodeId)->first();
    }
}