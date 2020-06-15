<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function __construct()
    {
        $this->middleware('checkRole:author');
    }
    public function comment(){

    }
    public function dashboard(){
        return view('author.dashboard');
    }

    public function post(){
        return view('author.post');
    }
}
