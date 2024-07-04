<?php

use App\Http\Controllers\loginController;
use Illuminate\Support\Facades\Route;


Route::controller(loginController::class)->group(function(){
    Route::get('/','Login');
});

