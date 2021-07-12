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

    public function aboutUs(){
        $about = About::select('description')->get()->first()->toArray();
        return view('frontend.about_us',compact('about'));
    }

    public function service($url=null){
        $service = Service::select('description')->where('url',$url)->get()->first()->toArray();
        return view('frontend.service',compact('service'));
    }
}
