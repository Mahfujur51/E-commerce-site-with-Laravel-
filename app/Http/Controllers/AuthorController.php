<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use Auth;

class AuthorController extends Controller
{
    public function __construct()
    {
        $this->middleware('checkRole:author');
    }
    public function comment(){

    }
    public function dashboard(){
        $posts=Post::Where('user_id',Auth::id())->pluck('id')->toArray();
        $allcoments=Comment::WhereIn('post_id',$posts)->get();
        return view('author.dashboard',compact('allcoments'));
    }

    public function post(){
        return view('author.post');
    }
    public function create(){
        return view('author.createpost');
    }
    public function store(){

    }
}
