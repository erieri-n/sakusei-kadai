<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;


Route::get('/students/{id}/edit', [StudentController::class, 'showEditForm'])->name('students.edit.form');


Route::post('/api/edit_student', [StudentController::class, 'edit'])->name('students.edit.api');


Route::get('/students', [StudentController::class, 'index'])->name('students.index');
Route::get('/students/{id}', [StudentController::class, 'show'])->name('students.show');
