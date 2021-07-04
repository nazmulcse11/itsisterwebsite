<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Session;

class SliderController extends Controller
{
    public function slider(){
        $sliders = Slider::all()->toArray();
        return view('backend.slider.slider',compact('sliders'));
    }

    public function addSlider(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();

            $rules = [
                'title'=>'required|max:190',
                'sub_title'=>'required|max:190',
            ];
            $customMessage = [
                'title.required'=>'Title is required',
                'title.max'=>'Title must not contain more than 190 charecters',
                'sub_title.required'=>'Sub title is required',
                'sub_title.max'=>'Title must not contain more than 190 charecters',
            ];

            $this->validate($request,$rules,$customMessage);

            $slider = new Slider();
            $slider->title = $data['title'];
            $slider->sub_title = $data['sub_title'];
            $slider->status = 0;
            $slider->image = 'no-image';
            $slider->save();
            Session::flash('message','Slider Successfully Added');
            return redirect('/admin/slider');
        }
        return view('backend.slider.add_slider');
    }
}
