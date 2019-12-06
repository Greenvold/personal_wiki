<?php

namespace App\Http\Controllers;

use App\ContactUsMessage;
use App\Http\Requests\ContactUsMessage\CreateContactUsMessage;
use App\Mail\ContactUsMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    //
    public function send2()
    {
        //generate message and send it to mail
        $data = array('name' => "Virat Gandhi");

        Mail::send(['text' => 'home.contact'], $data, function ($message) {
            $message->to('abc@gmail.com', 'Tutorials Point')->subject('Laravel Basic Testing Mail');
            $message->from('xyz@gmail.com', 'Virat Gandhi');
        });
    }

    public function send(CreateContactUsMessage $request)
    {
        ContactUsMessage::create([
            'title' => $request->title,
            'message' => $request->message,
            'category' => $request->category,
            'user_email' => $request->email
        ]);

        Mail::to('support@naucma.online')->send(new ContactUsMail($request));

        return back()->withSuccess('Thank you, we will get to you as soon as possible!');
    }
}