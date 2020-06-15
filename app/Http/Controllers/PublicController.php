<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index(){
        return view('welcome');
    }
    public function contact(){
       return view('contact');

    }
    public function about(){
        return view('about');
    }
    public function singlePost($id){
        return view('post');
    }
}
