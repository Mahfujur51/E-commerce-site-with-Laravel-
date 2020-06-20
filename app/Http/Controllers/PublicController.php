<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use Auth;

class PublicController extends Controller
{
    public function index(){
        $posts=Post::paginate(5);
        return view('welcome',compact('posts'));
    }
    public function contact(){
       return view('contact');

    }
    public function comment(Request $request){
        $this->validate($request,[
            'content'=>'required'

        ]);

        $comment=new Comment;
        $comment->content=$request->content;
        $comment->post_id=$request->post_id;
        $comment->user_id=Auth::id();
        $comment->save();
        return redirect()->back();

    }
    public function about(){
        return view('about');
    }
    public function singlePost($id){
        $post=Post::find($id);
        return view('post',compact('post'));
    }

}
