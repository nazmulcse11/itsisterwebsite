<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Course;
use App\Models\Post;
use App\Models\Email;
use App\Models\Contact;
use Session;

class DashboardController extends Controller
{
    public function dashboard(){
        $totalService = Service::all()->count();
        $TotalCourse = Course::all()->count();
        $ToalPost = Post::all()->count();
        $TotalEmail = Email::all()->count();

        $contacts = Contact::all()->toArray();
        $emails = Email::paginate(10);
        return view('backend.dashboard.dashboard',compact('totalService','TotalCourse','ToalPost','TotalEmail','contacts','emails'));
    }

    // view contact details
    public function viewContactDetails($id =null){
        $viewContact = Contact::where('id',$id)->first();
        return view('backend.dashboard.view_contact_details',compact('viewContact'));
    }

    // delete contact
    public function deleteContact($id=null){
        $delete = Contact::findOrFail($id)->delete();
             Session::flash('contact_message','Contact Successfully Deleted');
             return redirect()->back();
     }

     // delete email
    public function deleteEmail($id=null){
        $delete = Email::findOrFail($id)->delete();
             Session::flash('email_message','Email Successfully Deleted');
             return redirect()->back();
     }
}
