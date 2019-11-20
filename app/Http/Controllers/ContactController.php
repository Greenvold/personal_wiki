<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    //
    public function send()
    {
        //generate message and send it to mail
        $data = array('name' => "Virat Gandhi");

        Mail::send(['text' => 'home.contact'], $data, function ($message) {
            $message->to('abc@gmail.com', 'Tutorials Point')->subject('Laravel Basic Testing Mail');
            $message->from('xyz@gmail.com', 'Virat Gandhi');
        });
    }
}