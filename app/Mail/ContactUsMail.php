<?php

namespace App\Mail;

use App\Http\Requests\ContactUsMessage\CreateContactUsMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactUsMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $data;

    public function __construct(CreateContactUsMessage $request)
    {
        //
        $this->data = $request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->data->email)
            ->view('contact_us.email', [
                'name' => $this->data->title,
                'email' => $this->data->email,
                'bodyMessage' => $this->data->message
            ]);
    }
}