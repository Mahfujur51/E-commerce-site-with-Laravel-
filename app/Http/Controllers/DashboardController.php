<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Comment;
use Session;
use App\Product;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('checkRole:admin');
        $this->middleware('auth');
    }
    public function dashboard(){
        $post=Post::all()->count();
        $comment=Comment::all()->count();
        $user=User::all()->count();
        return view('admin.dashboard',compact('post','comment','user'));
    }
    public function comment(){
        $comments=Comment::all();
        return view('admin.comment',compact('comments'));
    }
    public function user(){
        $user=User::all();
        return view('admin.user',compact('user'));
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
    public function commentdelete($id){
        $comments=Comment::find($id);
        $comments->delete();
        Session::flash('success','Comment Delete successfully');
        return redirect()->back();

    }
    public function userdelete($id){
        $user=User::find($id);
        $user->delete();
        Session::flash('success','User Deleted successfully');
        return redirect()->back();
    }
    public function useredit($id){
        $user=User::find($id);
        return view('admin.edituser',compact('user'));
    }
    public function roleupdate(Request $request,$id){
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required'
        ]);
        $user=User::find($id);
        $user->name=$request->name;
        $user->email=$request->email;
        if ($request->author==1) {
            $user->author=true;

        }elseif ($request->admin==1) {
            $user->admin=true;
        }
        $user->update();
        Session::flash('success','User role Updated!!');
        return redirect()->back();
    }
    public function shop(){
        $product=Product::all();
        return view('admin.shop',compact('product'));
    }
    public function createproduct(){
        return view('admin.createproduct');
    }
    public function productstore(Request $request){
        $this->validate($request,[
            'title'=>'required',
            'price'=>'required',
            'description'=>'required'
        ]);
        $product=new Product;
        $product->title=$request->title;
        $product->price=$request->price;
        $product->description=$request->description;
        $image=$request->file('image');
        $image_name=time().$image->getClientOriginalName();
        $image->move('productimage',$image_name);
        $product->image='productimage/'.$image_name;
        $product->save();
        Session::flash('success','Product added successfully!!');
        return redirect()->back();
    }

}
