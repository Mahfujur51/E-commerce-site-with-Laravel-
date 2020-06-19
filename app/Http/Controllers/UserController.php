<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Comment;
use Auth;
use Session;
use Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
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
        if ($request->password!='') {
            if (!(Hash::check($request->password,Auth::user()->password))) {
                Session::flash('info','Current Password not mathc!!');
                return redirect()->back();
                # code...
            }if (strcmp($request->password, $request->new_password)==0) {
                Session::flash('info','You can not use old Password');
                return redirect()->back();
            }
        }
        if (strcmp($request->new_password, $request->confrim_password)!=0) {
            Session::flash('info','New password And Confirm Password Not mathch!!');
            return redirect()->back();
        }else{
            $user->password=bcrypt($request->new_password);
        }

        $user->update();
        Session::flash('success','Profile Updated Successfully!!');
        return redirect()->back();
    }
    public function delete($id){
        $comment=Comment::Where('id',$id)->Where('user_id',Auth::id())->first();
        if ($comment) {
            $comment->delete();
        }
        Session::flash('success','Comment Deleted Successfully!!');
        return redirect()->back();
    }
}
