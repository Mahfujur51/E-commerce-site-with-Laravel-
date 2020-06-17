<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;

class UserController extends Controller
{
    public function dashboard(){
        return view('user.dashboard');
    }
    public function comment(){
        return view('user.comment');

    }
    public function profile(){
        return view('user.profile');
    }
    public function update(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'email|required',
        ]);
        $user =Auth::user();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->update();
        Session::flash('success','Profile Updated Successfully!!');
        return redirect()->back();


    }
}
