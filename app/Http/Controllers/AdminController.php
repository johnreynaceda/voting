<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }
    public function student()
    {
        return view('admin.student');
    }
    public function position()
    {
        return view('admin.position');
    }
    public function partylist()
    {
        return view('admin.partylist');
    }
    public function candidate()
    {
        return view('admin.candidate');
    }
    public function votes()
    {
        return view('admin.votes');
    }
    public function candi_add()
    {
        return view('admin.candi_add');
    }
    public function users()
    {
        return view('admin.users');
    }
    public function report()
    {
        return view('admin.report');
    }
    public function print()
    {
        return view('admin.print');
    }
    public function printwinner()
    {
        return view('admin.printwinner');
    }
    public function cf()
    {
        return view('admin.cf');
    }
}
