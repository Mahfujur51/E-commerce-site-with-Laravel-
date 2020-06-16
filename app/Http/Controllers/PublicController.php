<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PublicController extends Controller
{
    public function index(){
        $posts=Post::all();
        return view('welcome',compact('posts'));
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
