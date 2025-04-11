<?php
namespace App\Channels;

use Illuminate\Notifications\Notification;

class WhatsAppChannel
{
    public function send($notifiable, Notification $notification)
    {
        $data = $notification->toWhatsapp($notifiable);

        \Log::info("Send WhatsApp to: " . $data['to'] . " with message: " . $data['message']);
    }
}

?>