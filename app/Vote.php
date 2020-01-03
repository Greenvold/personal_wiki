<?php

namespace App;

class Vote extends Model
{
    //
    protected $fillable = ['type', 'user_id', 'voteable_type', 'voteable_id'];
    public function voteable()
    {
        return $this->morphTo();
    }
}