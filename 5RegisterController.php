<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

       
        $facePath = null;
        if ($request->hasFile('face')) {
           
            $facePath = $request->file('face')->store('faces', 'public');
        }

        
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => '登録が完了しました！',
                'face_path' => $facePath,
            ]);
        }

     
        return redirect()->route('register.form')->with('success', '登録が完了しました！');
    }
}
