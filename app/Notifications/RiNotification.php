<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RiNotification extends Notification
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
    public function __construct($name, $message,  $path)
    {
        
        $this->name = $name;
        $this->message = $message;
        $this->path = $path;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
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
            'applicant_name' => $this->name,
            'message' => $this->message,
            'path' => $this->path,
        ];
    }
}
