<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class QuartersAddNotification extends Notification
{
    use Queueable;
    public $quartersName;
    public $quartersNo;
    public $message;
    public $path;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($quartersName,$quartersNo, $message,$path)
    {
       $this->quartersName = $quartersName;
       $this->quartersNo = $quartersNo;
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
            'quarters_name' => $this->quartersName,
            'quarters_no' => $this->quartersNo,
            'path' => $this->path,
            'message' => $this->message,
        ];
    }
}
