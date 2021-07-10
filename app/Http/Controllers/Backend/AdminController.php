<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Session;

class AdminController extends Controller
{
    public function user(){
        $users = User::latest()->get()->toArray();
        return view('backend.user.user',compact('users'));
    }

     // Add user/admin
     public function addUser(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();

            $rules = [
                'name'=>'required',
                'email'=>'required|unique:users',
                'password'=>'required',
            ];
            $customMessage = [
                'name.required'=>'Name is required',
                'email.required'=>'Email is required',
                'email.unique'=>'Email already exists',
                'password.required'=>'Password is required',
            ];
            $this->validate($request,$rules,$customMessage);
            
            if($data['password'] != $data['confirm_password']){
                Session::flash('error_message','Password and Confirm Password Does not match');
                return redirect()->back();
            }

            $user = new User();
            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->password = bcrypt($data['password']);
            $user->save();
            Session::flash('message','User Successfully Added');
            return redirect('/admin/user');
        }
        return view('backend.user.add_user');
    }

    // delete user
    public function deleteUser($id=null){
        $post = User::findOrFail($id)->delete();
             Session::flash('message','User Successfully Deleted');
             return redirect('/admin/user');
     }
}
