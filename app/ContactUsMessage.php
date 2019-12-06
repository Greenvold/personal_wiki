<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactUsMessage extends Model
{
    //
    protected $fillable = ['title', 'user_email', 'message', 'category'];
}