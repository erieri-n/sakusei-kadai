<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GradeController extends Controller
{
   
    public function showGradeForm()
    {
        return view('grade.form');
    }

   
    public function updateGrade(Request $request)
    {
        $validated = $request->validate([
            'year' => 'required|integer',
            'grade' => 'required|integer|min:1|max:3',
        ]);

        
        return response()->json(['success' => true, 'message' => '学年情報を更新しました']);
    }
}
