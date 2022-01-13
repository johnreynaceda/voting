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
        return view('voter.tabulation');
    }
}
