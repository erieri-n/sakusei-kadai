<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    // 登録画面の表示
    public function showRegister()
    {
        return view('register');
    }

    // 登録処理
    public function register(Request $request)
    {
        $validated = $request->validate([
            'username' => ['required', 'string', 'max:255'],
            'mailaddress' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:6', 'confirmed'],
        ]);

        $user = User::create([
            'name' => $validated['username'],
            'email' => $validated['mailaddress'],
            'password' => Hash::make($validated['password']),
        ]);

        // 登録後のリダイレクト
        return redirect('/login')->with('message', '登録に成功しました！ログインしてください。');
    }
}
