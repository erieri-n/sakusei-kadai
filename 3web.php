<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GradeController;


Route::get('/grade', [GradeController::class, 'showGradeForm'])->name('grade.form');


Route::post('/api/update_grade', [GradeController::class, 'updateGrade'])
    ->name('grade.update');


Route::get('/student/register', function () {
    return view('student.register');
})->name('student.register');


Route::get('/grade/show', function () {
    return view('grade.show');
})->name('grade.show');
