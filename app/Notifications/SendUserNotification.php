<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendUserNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $message;

    public function __construct($message)
    {
        $this->message = $message;
    }

    public function via(object $notifiable): array
    {
        return ['whatsapp', 'sms'];

    }

    public function toWhatsapp($notifiable)
    {
        return [
            'to' => $notifiable->phone,
            'message' => $this->message
        ];
    }

    public function toSms($notifiable)
    {
        return [
            'to' => $notifiable->phone,
            'message' => $this->message
        ];
    }
}
