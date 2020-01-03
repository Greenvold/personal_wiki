<?php

namespace App;

class Question extends Model
{
    //
    protected $fillable = ['title', 'content', 'user_id', 'questionable_type', 'questionable_id'];

    public function questionable()
    {
        return $this->morphTo();
    }

    public function guide()
    {
        return $this->belongsTo(Guide::class, 'questionable_id', 'id');
    }

    public function author()
    {
        return $this->hasOne(User::class, 'id');
    }
}