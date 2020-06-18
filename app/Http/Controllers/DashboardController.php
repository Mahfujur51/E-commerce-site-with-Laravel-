<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Comment;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('checkRole:admin');
    }
    public function dashboard(){
        $post=Post::all()->count();
        $comment=Comment::all()->count();
        $user=User::all()->count();
        return view('admin.dashboard',compact('post','comment','user'));
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
