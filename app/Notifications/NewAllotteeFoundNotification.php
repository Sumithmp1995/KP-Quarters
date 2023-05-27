<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewAllotteeFoundNotification extends Notification
{
    use Queueable;
    public $name;
    public $message;
    public $path;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($name, $message,$path)
    {
       $this->name = $name;
       $this->message = $message;
       $this->path = $path;

    }


    public function via($notifiable)
    {
        return ['database'];
    }


    public function toArray($notifiable)
    {
        return [
            'applicant_name' => $this->name,
            'path' => $this->path,
            'message' => $this->message,
        ];
    }
}
