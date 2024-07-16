<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/',[EventController::class,'index']);
Route::get('/home',[EventController::class,'index']);