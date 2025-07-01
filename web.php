<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

// ログイン画面の表示（GETリクエスト）
Route::get('/login', [LoginController::class, 'showLogin'])->name('login');

// ログイン処理（POSTリクエスト）
Route::post('/login', [LoginController::class, 'login'])->name('login.post');

// 新規登録画面の表示（GETリクエスト）
Route::get('/register', [LoginController::class, 'showRegister'])->name('register');

// 新規登録処理（POSTリクエスト）
Route::post('/register', [LoginController::class, 'register'])->name('register.post');

