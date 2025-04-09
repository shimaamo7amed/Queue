<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendNotificationsAllUsers implements ShouldQueue
{
    use Queueable;
    public function handle(): void
    {
        $users = User::all();
        if ($users) {
        /*
        replace sending email by adding email content to file
        */
        foreach ($users as $user) {
        $file = public_path("test/{$users->id}.txt");
        $handle = fopen($file, "w");
        $content = "Welcom , {$users->email}";
        fwrite($handle, $content);
        fclose($handle);
        }
        }else {
        $file = public_path("test/result.txt");
        $handle = fopen($file, "w");
        $content = "No Users Found";
        fwrite($handle, $content);
        fclose($handle);
        }
    }
}