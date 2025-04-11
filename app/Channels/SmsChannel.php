<?php
namespace App\Channels;

use Illuminate\Notifications\Notification;

class SmsChannel
{
    public function send($notifiable, Notification $notification)
    {
        $data = $notification->toSms($notifiable);

        // نفس الفكرة، تجمع الأرقام وتبعت كل 10 مع بعض
        \Log::info("Send SMS to: " . $data['to'] . " with message: " . $data['message']);
        // هنا تستخدم API الإرسال الحقيقي
    }
}
