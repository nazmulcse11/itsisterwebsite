<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Session;
use Image;
use File;

class SliderController extends Controller
{
    public function slider(){
        // $sliders = Slider::all()->toArray();
        $sliders = Slider::latest()->get()->toArray();
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

            $image = $request->file('image');
            if(isset($image)){
                $imageName = rand(99,99999).'-'.uniqid().'.'.$image->getClientOriginalExtension();
                $imagePath = 'images/slider/'.$imageName;
                Image::make($image)->resize(780,646)->save($imagePath);
            }else{
                $imageName = '';
            }

            $slider = new Slider();
            $slider->title = $data['title'];
            $slider->sub_title = $data['sub_title'];
            $slider->status = 0;
            $slider->image =  $imageName ;
            $slider->save();
            Session::flash('message','Slider Successfully Added');
            return redirect('/admin/slider');
        }
        return view('backend.slider.add_slider');
    }

    // Edit Slider
    public function editSlider(Request $request, $id=null){
        $editData = Slider::findOrFail($id)->toArray();
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

            $image = $request->file('image');
            if(isset($image)){
                $deleteOldImage = 'images/slider/'.$editData['image'];
                if(file_exists($deleteOldImage)){
                    File::delete($deleteOldImage);
                }
                $imageName = rand(99,99999).'-'.uniqid().'.'.$image->getClientOriginalExtension();
                $imagePath = 'images/slider/'.$imageName;
                Image::make($image)->resize(780,646)->save($imagePath);
            }else{
                $imageName = $editData['image'];
            }

            $slider = Slider::findOrFail($id);
            $slider->title = $data['title'];
            $slider->sub_title = $data['sub_title'];
            $slider->image =  $imageName ;
            $slider->save();
            Session::flash('message','Slider Successfully Updated');
            return redirect('/admin/slider');
        }
        return view('backend.slider.edit_slider',compact('editData'));
    }

    // delete slider
    public function deleteSlider($id=null){
       $slider = Slider::findOrFail($id);
       $deleteImage = 'images/slider/'.$slider['image'];
                if(file_exists($deleteImage)){
                    File::delete($deleteImage);
                    $slider->delete();
                }
            Session::flash('message','Slider Successfully Deleted');
            return redirect('/admin/slider');
    }
    
    // update slider status
    public function updateSliderStatus($id=null){
        $updateSliderStatus = Slider::findOrFail($id)->toArray();
        if($updateSliderStatus['status'] == 0){
            $status = 1;
        }
        if($updateSliderStatus['status'] == 1){
            $status = 0;
        }
        $slider = Slider::findOrFail($id);
        $slider->status =  $status;
        $slider->save();
        Session::flash('message','Slider Status Successfully Updated');
        return redirect()->back();
    }

    // view slider details
    public function viewSliderDetails($id=null){
        $viewSlider = Slider::findOrFail($id)->toArray();
        return view('backend.slider.view_slider_details',compact('viewSlider'));
    }
}
