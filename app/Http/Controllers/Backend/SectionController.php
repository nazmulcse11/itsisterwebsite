<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Section;
use Session;

class SectionController extends Controller
{
    // show/get/read/featch section
    public function section(){
        $sections = Section::latest()->get()->toArray();
        return view('backend.section.section',compact('sections'));
    }

    // add section
    public function addSection(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();

            $rules = [
                'type'=>'required',
                'type'=>'required|unique:sections',
                'mini_description'=>'required',
            ];
            $customMessage = [
                'type.required'=>'Type is required',
                'type.unique'=>'Type already exists',
                'mini_description.required'=>'Mini Description is required',
            ];

            $this->validate($request,$rules,$customMessage);

            $section = new Section();
            $section->type = $data['type'];
            $section->mini_description = $data['mini_description'];
            $section->save();
            Session::flash('message','Section Successfully Added');
            return redirect('/admin/section');
        }
        return view('backend.section.add_section');
    }

     // Edit Section
     public function editSection(Request $request, $id=null){
        $editData = Section::findOrFail($id)->toArray();
        if($request->isMethod('post')){
            $data = $request->all();

            $rules = [
                'type'=>'required',
                'mini_description'=>'required',
            ];
            $customMessage = [
                'type.required'=>'Type is required',
                'mini_description.required'=>'Mini Description is required',
            ];
            $this->validate($request,$rules,$customMessage);

            $section = Section::findOrFail($id);
            $section->type = $data['type'];
            $section->mini_description = $data['mini_description'];
            $section->save();
            Session::flash('message','Section Successfully Updated');
            return redirect('/admin/section');
        }
        return view('backend.section.edit_section',compact('editData'));
    }

    // delete section
    public function deleteSection($id=null){
        $about = Section::findOrFail($id)->delete();
        Session::flash('message','Section Successfully Deleted');
        return redirect('/admin/section');
     }

     // view about details
    public function viewSectionDetails($id=null){
        $viewSection = Section::findOrFail($id)->toArray();
        return view('backend.section.view_section_details',compact('viewSection'));
    }
}
