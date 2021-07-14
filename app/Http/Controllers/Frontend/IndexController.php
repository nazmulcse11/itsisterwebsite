<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Client;
use App\Models\About;
use App\Models\Contact;
use App\Models\Service;
use App\Models\Section;
use App\Models\Team;
use App\Models\Course;
use App\Models\Post;
use App\Models\Email;
use Session;

class IndexController extends Controller
{
    public function index(){
        $servicee = Section::where('type','service')->first()->toArray();
        $callToAction = Section::where('type','call to action')->first()->toArray();
        $team = Section::where('type','team')->first()->toArray();
        $course = Section::where('type','course')->first()->toArray();

        $slider = Slider::where('status','1')->first()->toArray();
        $clients = Client::get()->toArray();
        $about = About::get()->first()->toArray();
        $services = Service::get()->toArray();
        $teams = Team::get()->toArray();
        $courses = Course::where('status','1')->get()->toArray();
        $footerServices = Service::inRandomOrder()->take(4)->get()->toArray();
        return view('frontend.index',compact('servicee','callToAction','team','course','slider','clients','about','services','teams','courses','footerServices'));
    }
    
    // show about us details
    public function aboutUs(){
        $about = About::select('description')->get()->first()->toArray();
        $footerServices = Service::inRandomOrder()->take(4)->get()->toArray();
        return view('frontend.about_us',compact('about','footerServices'));
    }
    
    // show service details
    public function service($url=null){
        $service = Service::select('title','description')->where('url',$url)->get()->first()->toArray();
        $footerServices = Service::inRandomOrder()->take(4)->get()->toArray();
        return view('frontend.service',compact('service','footerServices'));
    }
   
    // show all blog posts
    public function blog(){
        $posts = Post::where('status','1')->get()->toArray();
        $footerServices = Service::inRandomOrder()->take(4)->get()->toArray();
        return view('frontend.all_post',compact('posts','footerServices'));
    }

    // post details
    public function postDetails($url=null){
        $postDetails = Post::where('url',$url)->first()->toArray();
        $relatedPost = Post::inRandomOrder()->take(20)->get()->toArray();
        $footerServices = Service::inRandomOrder()->take(4)->get()->toArray();
        return view('frontend.post_details',compact('postDetails','relatedPost','footerServices'));
    }

    //subscribe us
    public function subscribeUs(Request $request){
        if($request->ajax()){
           $data = $request->all();
           if(!empty($data['email'])){
            $email = new Email();
            $email->email = $data['email'];
            $email->save();
            return response()->json([
                 'status'=>'success',
            ]);  
           }else{
            Session::flash('error_message','Please Enter Valid Email');
            return redirect()->back();
           }
           
        }
    }

     //contact us
     public function contactUs(Request $request){
        if($request->ajax()){
            $data = $request->all();
            if(!empty($data['name']) || !empty($data['email']) || !empty($data['subject']) || !empty($data['message'])){
             $contact = new Contact();
             $contact->name = $data['name'];
             $contact->email = $data['email'];
             $contact->subject = $data['subject'];
             $contact->message = $data['message'];
             $contact->save();
             return response()->json([
                  'status'=>'success',
             ]);  
            }else{
             Session::flash('error_message','Please Enter Value All Fields');
             return redirect()->back();
            }
            
         }
         $footerServices = Service::inRandomOrder()->take(4)->get()->toArray();
         return view('frontend.contact_us',compact('footerServices'));
    }

}
