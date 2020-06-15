<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('checkRole:admin');
    }
    public function dashboard(){
        return view('admin.dashboard');
    }
    public function comment(){
        return view('admin.comment');
    }
    public function user(){
        return view('admin.user');
    }
    public function post(){
        return view('admin.post');
    }
}
