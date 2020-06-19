<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Comment;
use Session;

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
        $posts=Post::all();
        return view('admin.post',compact('posts'));
    }
    public function delete($id){
        $posts=Post::find($id);
        $posts->delete();
        Session::flash('success','Post Delete successfully!!');
        return redirect()->back();
    }
    public function edit($id){
        $posts=Post::find($id);
        return view('admin.editpost',compact('posts'));
    }
    public function update(Request $request,$id){
        $this->validate($request,[
            'title'=>'required',
            'content'=>'required'
        ]);
        $posts=Post::find($id);
        $posts->title=$request->title;
        $posts->content=$request->content;
        $posts->update();
        Session::flash('success','Post updated successfully!!');
        return redirect()->route('admin.post');
    }
}
