<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ScoreController;

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login'])->name('login.submit');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// 学生詳細・成績画面の表示
Route::get('/students/{id}', [StudentController::class, 'show'])->name('students.show');

// 学生編集画面
Route::get('/students/{id}/edit', [StudentController::class, 'edit'])->name('students.edit');

// 成績表示画面
Route::get('/students/{id}/scores', [ScoreController::class, 'index'])->name('scores.index');

// 成績登録画面
Route::get('/students/{id}/scores/create', [ScoreController::class, 'create'])->name('scores.create');

// 学生情報の更新API
Route::post('/api/update_student', [StudentController::class, 'update'])->name('students.update.api');

// 成績登録API
Route::post('/api/register_score', [ScoreController::class, 'store'])->name('scores.store.api');

// 戻るボタンの遷移先（例：学生一覧）
Route::get('/students', [StudentController::class, 'index'])->name('students.index');
