<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScoreController extends Controller
{
    
    public function showEditForm($id)
    {
        
        return view('scores.edit'); 
    }


    public function edit(Request $request)
    {
        $validated = $request->validate([
            'glade' => 'required|in:1,2,3',
            
            'japanese' => 'required|in:1,2,3,4,5',
            'math'     => 'required|in:1,2,3,4,5',
            'science'     => 'required|in:1,2,3,4,5',
            'social'     => 'required|in:1,2,3,4,5',
            'music'     => 'required|in:1,2,3,4,5',
            'homeeconomics'     => 'required|in:1,2,3,4,5',
            'english'     => 'required|in:1,2,3,4,5',
            'art'     => 'required|in:1,2,3,4,5',
            'pe'     => 'required|in:1,2,3,4,5',

            
            
          
        ]);



        return response()->json(['success' => true, 'message' => '成績が編集されました！']);
    }

   
    public function index()
    {
       
        return view('scores.index');
    }
}
