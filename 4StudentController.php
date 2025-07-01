<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student; 

class StudentController extends Controller
{
   
    public function showSearchForm()
    {
        return view('students.search');
    }

   
    public function searchStudents(Request $request)
    {
        $name = $request->input('name');
        $grade = $request->input('grade');

        
        $query = Student::query();
        if ($name) {
            $query->where('name', 'like', "%{$name}%");
        }
        if ($grade) {
            $query->where('grade', $grade);
        }
        $students = $query->get(['name', 'grade']);

        return response()->json(['students' => $students]);
    }
}
    