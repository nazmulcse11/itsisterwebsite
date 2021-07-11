<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use Session;

class AboutController extends Controller
{
    public function about(){
        $abouts = About::latest()->get()->toArray();
        return view('backend.about.about',compact('abouts'));
    }

    // add about
    public function addAbout(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();

            $rules = [
                'who_we_are'=>'required',
                'why_choose_us'=>'required',
                'description'=>'required',
            ];
            $customMessage = [
                'who_we_are.required'=>'Who we are is required',
                'why_choose_us.required'=>'Why choose us is required',
                'description.required'=>'Description is required',
            ];

            $this->validate($request,$rules,$customMessage);

            $about = new About();
            $about->who_we_are = $data['who_we_are'];
            $about->why_choose_us = $data['why_choose_us'];
            $about->description = $data['description'];
            $about->save();
            Session::flash('message','About Successfully Added');
            return redirect('/admin/about');
        }
        return view('backend.about.add_about');
    }

     // Edit About
     public function editAbout(Request $request, $id=null){
        $editData = About::findOrFail($id)->toArray();
        if($request->isMethod('post')){
            $data = $request->all();

            $rules = [
                'who_we_are'=>'required',
                'why_choose_us'=>'required',
                'description'=>'required',
            ];
            $customMessage = [
                'who_we_are.required'=>'Who we are is required',
                'why_choose_us.required'=>'Why choose us is required',
                'description.required'=>'Description is required',
            ];
            $this->validate($request,$rules,$customMessage);

            $about = About::findOrFail($id);
            $about->who_we_are = $data['who_we_are'];
            $about->why_choose_us = $data['why_choose_us'];
            $about->description = $data['description'];
            $about->save();
            Session::flash('message','About Successfully Updated');
            return redirect('/admin/about');
        }
        return view('backend.about.edit_about',compact('editData'));
    }

      // delete about
      public function deleteAbout($id=null){
        $about = About::findOrFail($id)->delete();
        Session::flash('message','About Successfully Deleted');
        return redirect('/admin/about');
     }


    // view about details
    public function viewAboutDetails($id=null){
        $viewAbout = About::findOrFail($id)->toArray();
        return view('backend.about.view_about_details',compact('viewAbout'));
    }
}
