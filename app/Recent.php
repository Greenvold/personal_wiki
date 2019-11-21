<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recent extends Model
{
    //
    protected $fillable = ['user_id', 'recentable_id', 'recentable_type'];
}