<?php

namespace App;

class Recent extends Model
{
    //
    protected $fillable = ['user_id', 'recentable_id', 'recentable_type'];

    public function recentable()
    {
        return $this->morphTo();
    }
}