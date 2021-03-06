<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use Auth;
use Session;

class AuthorController extends Controller
{
    public function __construct()
    {
        $this->middleware('checkRole:author');
        $this->middleware('auth');
    }
    public function comment(){
       return view('author.comment');
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
    public function store(Request $request){
        $this->validate($request,[
            'title'=>'required',
            'content'=>'required'

        ]);

        $user_id=Auth::id();
        $post=new Post();
        $post->title=$request->title;
        $post->content=$request->content;
        $post->user_id=$user_id;
        $post->save();
        Session::flash('success','Post Created Successfully!!');
        return redirect()->back();


    }
    public function delete($id){
       $post=Post::Where('id',$id)->Where('user_id',Auth::id())->first();
       if ($post) {
        $post->delete();
        Session::flash('success','Post Deleted Successfully!!');
        return redirect()->back();
       }else{
        Session::flash('info','Nothing to Deleted!!');
        return redirect()->back();
       }
    }
    public function edit($id){
         $posts=Post::Where('id',$id)->Where('user_id',Auth::id())->first();
         return view('author.update',compact('posts'));
    }
    public function update(Request $request,$id){
        $this->validate($request,[
            'title'=>'required',
            'content'=>'required'

        ]);
         $posts=Post::Where('id',$id)->Where('user_id',Auth::id())->first();
         $posts->title=$request->title;
         $posts->content=$request->content;
         $posts->update();
         Session::flash('success','Post updated Successfully');
         return redirect()->route('author.post');

    }
   public function commentdelete($id){
    $posts=Comment::Where('id',$id)->Where('user_id',Auth::id())->first();
    $posts->delete();
    Session::flash('success','Comment Deleted Successfully');
   }
}
