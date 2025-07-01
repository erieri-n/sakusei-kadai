<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScoreController;

Route::get('/scores/register', [ScoreController::class, 'showRegisterForm'])->name('scores.register.form');


Route::post('/api/register_score', [ScoreController::class, 'register'])->name('scores.register.api');


Route::get('/scores', [ScoreController::class, 'index'])->name('scores.index');
