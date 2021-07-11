<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Session;
use File;
use Image;

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

     //update user details
     public function updateDetails(Request $request, $id){
         $editData = User::findOrFail($id)->toArray();

         if($request->isMethod('post')){
            $data = $request->all();

            $rules = [
                'name'=>'required',
            ];
            $customMessage = [
                'name.required'=>'Name is required',
            ];
            $this->validate($request,$rules,$customMessage);

            $image = $request->file('image');
            if(isset($image)){
                $deleteOldImage = 'images/profile/'.$editData['image'];
                if(file_exists($deleteOldImage)){
                    File::delete($deleteOldImage);
                }
                $imageName = rand(99,99999).'-'.uniqid().'.'.$image->getClientOriginalExtension();
                $imagePath = 'images/profile/'.$imageName;
                Image::make($image)->resize(150,150)->save($imagePath);
            }else{
                $imageName = $editData['image'];
            }

            $updateDetails = User::findOrFail($id);
            $updateDetails->name = $data['name'];
            $updateDetails->phone = $data['phone'];
            $updateDetails->image =  $imageName ;
            $updateDetails->save();
            Session::flash('message','Your Details Successfully Updated');
            return redirect()->back();
        }
         return view('backend.user.update_details',compact('editData'));
     }

     //update user password
     public function updatePassword(Request $request, $id){
        if($request->isMethod('post')){
           $data = $request->all();
           $rules = [
               'password'=>'required',
               'confirm_password'=>'required',
           ];
           $customMessage = [
               'password.required'=>'Password is required',
               'confirm_password.required'=>'Confirm password is required',
           ];
           $this->validate($request,$rules,$customMessage);

           if($data['password'] != $data['confirm_password']){
            Session::flash('error_message','Password and Confirm Password Does not match');
            return redirect()->back();
           }

           $updatePassword = User::findOrFail($id);
           $updatePassword->password = bcrypt($data['password']);
           $updatePassword->save();
           Session::flash('message','Your Password Successfully Updated');
           return redirect()->back();
       }
        return view('backend.user.update_password');
    }
}
