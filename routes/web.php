<?php

use App\Http\Controllers\GeneralController;
use App\Http\Controllers\RentController;
use App\Http\Controllers\RoomController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/general', function () {
        return view('general.index');
    })->name('general');
});

Route::resource('/rooms', RoomController::class);
Route::resource('/rents', RentController::class);
Route::resource('/general', GeneralController::class);
Route::get('/general/{id}/{balance}', [GeneralController::class, 'charged'])->name('general.charged');
