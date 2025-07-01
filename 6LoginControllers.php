<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
   
    protected $redirectTo = '/home';

    public function __construct()
    {
       
        $this->middleware('guest')->except('logout');
    }

   
    public function showLoginForm()
    {
        return view('auth.login'); 
    }

    
    public function login(Request $request)
    {
       
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        
        if (Auth::attempt($credentials, $request->filled('remember'))) {
            
            $request->session()->regenerate();

           
            return redirect()->intended($this->redirectTo);
        }

       
        throw ValidationException::withMessages([
            'email' => __('auth.failed'),
        ]);
    }

    
    public function logout(Request $request)
    {
        Auth::logout();

       
        $request->session()->invalidate();

        
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
