<?php

namespace App\Notifications;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewQuestion extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */

    private $question;
    private $asset;

    public function __construct($question)
    {
        //
        $this->question = $question;
        $this->asset = $question->questionable_type::findOrFail($question->questionable_id);
        $this->author = User::findOrFail($question->user_id);
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        if ($this->asset->type == 'guide') {
            return (new MailMessage)
                ->line('New questions has been submitted for your guide ' . $this->asset->title . ' by ' . $this->author->name . '.')
                ->action('Review it here', route('guide.show', $this->asset->slug))
                ->line('Thank you for using NaucMa!');
        } else {
            return (new MailMessage)
                ->line('New questions has been submitted for your course ' . $this->asset->title . ' by ' . $this->author->name . '.')
                ->action('Review it here', route('course.show', $this->asset->slug))
                ->line('Thank you for using NaucMa!');
        }
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
            'question' => $this->question
        ];
    }
}