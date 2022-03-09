<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        return view('voter.dashboard');
    }
    public function tabulation()
    {
        if (auth()->user()->isvoted == 0) {
          
          return redirect()->route('student-dashboard');
        
         
        }else{
             return view('voter.tabulation');
        }
       
    }
}
