<?php

namespace App\Http\Controllers;

use Illuminate\Bus\Batch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\Log;
use App\Jobs\SendCategoryNotification;
use App\Jobs\SendNotificationsAllUsers;

class NotifyController extends Controller
{

   public function notifyUsers()
{
    try {
       
dispatch(new SendNotificationsAllUsers());


        return response()->json([
            'status' => 'success',
            'message' => 'All notifications will be sent to users via queue.'
        ]);
    } catch (\Throwable $th) {
        Log::error($th);
        return response()->json([
            'status' => 'error',
            'message' => 'Something went wrong while dispatching notifications.'
        ], 500);
    }
}

}
