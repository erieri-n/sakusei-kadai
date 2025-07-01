<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
   
    public function showEditForm($id)
    {
   
        return view('students.edit'); 
    }

 
    public function edit(Request $request)
    {
        $validated = $request->validate([
            'grade'   => 'required|in:1,2,3',
            'name'    => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'photo'   => 'nullable|image|max:2048', 
      
        ]);



        return response()->json(['success' => true, 'message' => '学生情報が編集されました！']);
    }

   
    public function index()
    {

        return view('students.index');
    }

 
    public function show($id)
    {

        return view('students.show');
    }
}
