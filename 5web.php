<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;


Route::get('/register', [RegisterController::class, 'showForm'])->name('register.form');

Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');


namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
 
    public function showForm()
    {
        return view('register'); 
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'face' => 'required|image|max:2048', 
        ]);

       
        if ($request->hasFile('face')) {
            $path = $request->file('face')->store('faces', 'public');
        }

       

        
        return response()->json(['success' => true, 'message' => '登録が完了しました！']);
    }
}
