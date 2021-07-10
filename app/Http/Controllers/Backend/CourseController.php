<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use Session;

class CourseController extends Controller
{
    public function course(){
        $courses = Course::latest()->get()->toArray();
        return view('backend.course.course',compact('courses'));
    }

    // add service
    public function addCourse(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();

            $rules = [
                'title'=>'required|max:190',
                'course_fee'=>'required',
                'mini_title'=>'required',
                'description'=>'required',
            ];
            $customMessage = [
                'title.required'=>'Title is required',
                'title.max'=>'Title must not contain more than 190 charecters',
                'mini_title.required'=>'Mini title is required',
                'description.required'=>'Description is required',
            ];

            $this->validate($request,$rules,$customMessage);

            $course = new Course();
            $course->title = $data['title'];
            $course->course_fee = $data['course_fee'];
            $course->mini_title = $data['mini_title'];
            $course->status = 0;
            $course->description = $data['description'];
            $course->save();
            Session::flash('message','Course Successfully Added');
            return redirect('/admin/courses');
        }
        return view('backend.course.add_course');
    }

    // Edit Course
    public function editCourse(Request $request, $id=null){
        $editData = Course::findOrFail($id)->toArray();
        if($request->isMethod('post')){
            $data = $request->all();

            $rules = [
                'title'=>'required|max:190',
                'course_fee'=>'required',
                'mini_title'=>'required',
                'description'=>'required',
            ];
            $customMessage = [
                'title.required'=>'Title is required',
                'title.max'=>'Title must not contain more than 190 charecters',
                'mini_title.required'=>'Mini title is required',
                'description.required'=>'Description is required',
            ];
            $this->validate($request,$rules,$customMessage);

            $course = Course::findOrFail($id);
            $course->title = $data['title'];
            $course->course_fee = $data['course_fee'];
            $course->mini_title = $data['mini_title'];
            $course->description = $data['description'];
            $course->save();
            $course->save();
            Session::flash('message','Course Successfully Updated');
            return redirect('/admin/courses');
        }
        return view('backend.course.edit_course',compact('editData'));
    }

    // delete course
    public function deleteCourse($id=null){
        $course = Course::findOrFail($id)->delete();
        Session::flash('message','Course Successfully Deleted');
        return redirect('/admin/courses');
     }

     // view course details
    public function viewCourseDetails($id=null){
        $viewCourse = Course::findOrFail($id)->toArray();
        return view('backend.course.view_course_details',compact('viewCourse'));
    }

    // update course status
    public function updateCourseStatus($id=null){
        $updateCourseStatus = Course::findOrFail($id)->toArray();
        if($updateCourseStatus['status'] == 0){
            $status = 1;
        }
        if($updateCourseStatus['status'] == 1){
            $status = 0;
        }
        $course = Course::findOrFail($id);
        $course->status =  $status;
        $course->save();
        Session::flash('message','Course Status Successfully Updated');
        return redirect()->back();
    }
}
