<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;


Route::get('/students/search', [StudentController::class, 'showSearchForm'])->name('students.search');


Route::post('/api/search_students', [StudentController::class, 'searchStudents'])->name('students.search.api');

Route::get('/students/search', [StudentController::class, 'showSearchForm'])->name('students.search');
Route::post('/api/search_students', [StudentController::class, 'searchStudents'])->name('students.search.api');
