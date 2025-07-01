<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScoreController;


Route::get('/scores/{id}/edit', [ScoreController::class, 'showEditForm'])->name('scores.edit.form');


Route::post('/api/edit_score', [ScoreController::class, 'edit'])->name('scores.edit.api');


Route::get('/scores', [ScoreController::class, 'index'])->name('scores.index');
