<?php

use App\Http\Controllers\GeneralController;
use App\Http\Controllers\RentController;
use App\Http\Controllers\RoomController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('general.index');
    // return view('auth.login');
});

Route::resource('/general', GeneralController::class);
Route::resource('/rooms', RoomController::class);
Route::resource('/rents', RentController::class);
Route::get('/general/{id}/{balance}', [GeneralController::class, 'charged'])->name('general.charged');