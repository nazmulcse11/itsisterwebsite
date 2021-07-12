<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Client;
use App\Models\About;

class IndexController extends Controller
{
    public function index(){
        $slider = Slider::where('status','1')->first()->toArray();
        $clients = Client::get()->toArray();
        $about = About::get()->first()->toArray();
        return view('frontend.index',compact('slider','clients','about'));
    }
}
