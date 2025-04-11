<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Foundation\Queue\Queueable;
use App\Notifications\SendUserNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendNotificationsAllUsers implements ShouldQueue
{
    use Queueable;
    use Dispatchable, Queueable;

    public function handle(): void
    {
        $users = User::all();
        $message = "Welcom";

        foreach ($users as $user) {
            $user->notify(new SendUserNotification($message));
        }
    }
}