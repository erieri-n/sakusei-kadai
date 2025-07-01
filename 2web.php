<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;


Route::get('/register', function () {
    return view('login'); 
})->name('register');


Route::post('/register', [RegisterController::class, 'register'])->name('register.post');
