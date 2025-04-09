<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotifyController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/queue',[NotifyController::class,'notifyUsers']);

