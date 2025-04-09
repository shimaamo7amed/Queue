<?php

namespace App\Http\Controllers;

use Illuminate\Bus\Batch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Bus;
use App\Jobs\SendCategoryNotification;
use App\Jobs\SendNotificationsAllUsers;

class NotifyController extends Controller
{

    public function notifyUsers()
    {
        try {
            dispatch(new SendNotificationsAllUsers());
            return "Success,All notification will send to all users shortly";
        } catch (\Throwable $th) {
            throw $th;
        }

    }

}
