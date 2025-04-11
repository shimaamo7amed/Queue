<?php

namespace App\Providers;

use App\Channels\SmsChannel;
use App\Channels\WhatsAppChannel;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Notification;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Notification::extend('whatsapp', function ($app) {
        return new WhatsAppChannel;
        });

        Notification::extend('sms', function ($app) {
            return new SmsChannel;
        });
    }
}
