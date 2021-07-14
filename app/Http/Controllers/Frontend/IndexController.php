<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Client;
use App\Models\About;
use App\Models\Service;
use App\Models\Section;
use App\Models\Team;
use App\Models\Course;
use App\Models\Post;

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
        return view('frontend.index',compact('servicee','callToAction','team','course','slider','clients','about','services','teams','courses'));
    }
    
    // show about us details
    public function aboutUs(){
        $about = About::select('description')->get()->first()->toArray();
        return view('frontend.about_us',compact('about'));
    }
    
    // show service details
    public function service($url=null){
        $service = Service::select('title','description')->where('url',$url)->get()->first()->toArray();
        return view('frontend.service',compact('service'));
    }
   
    // show all blog posts
    public function blog(){
        $posts = Post::where('status','1')->get()->toArray();
        return view('frontend.all_post',compact('posts'));
    }

    // post details
    public function postDetails($url=null){
        $postDetails = Post::where('url',$url)->first()->toArray();
        $relatedPost = Post::inRandomOrder()->take(10)->get()->toArray();
        return view('frontend.post_details',compact('postDetails','relatedPost'));
    }
}
