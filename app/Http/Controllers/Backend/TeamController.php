<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team;
use Session;
use Image;
use File;

class TeamController extends Controller
{
    public function team(){
        $teams = Team::latest()->get()->toArray();
        return view('backend.team.team',compact('teams'));
    }
    
    // Add team
    public function addTeam(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();

            $rules = [
                'name'=>'required',
                'designation'=>'required',
                'mini_description'=>'required',
            ];
            $customMessage = [
                'name.required'=>'Name is required',
                'designation.required'=>'Designation is required',
                'mini_description.required'=>'Mini Description is required',
            ];

            $this->validate($request,$rules,$customMessage);

            $image = $request->file('image');
            if(isset($image)){
                $imageName = rand(99,99999).'-'.uniqid().'.'.$image->getClientOriginalExtension();
                $imagePath = 'images/team/'.$imageName;
                Image::make($image)->resize(780,646)->save($imagePath);
            }else{
                $imageName = '';
            }

            $team = new Team();
            $team->name = $data['name'];
            $team->designation = $data['designation'];
            $team->mini_description = $data['mini_description'];
            $team->image =  $imageName ;
            $team->save();
            Session::flash('message','Team Member Successfully Added');
            return redirect('/admin/team');
        }
        return view('backend.team.add_team');
    }

    // Edit team
    public function editTeam(Request $request, $id=null){
        $editData = Team::findOrFail($id)->toArray();
        if($request->isMethod('post')){
            $data = $request->all();

            $rules = [
                'name'=>'required',
                'designation'=>'required',
                'mini_description'=>'required',
            ];
            $customMessage = [
                'name.required'=>'Name is required',
                'designation.required'=>'Designation is required',
                'mini_description.required'=>'Mini Description is required',
            ];
            $this->validate($request,$rules,$customMessage);

            $image = $request->file('image');
            if(isset($image)){
                $deleteOldImage = 'images/team/'.$editData['image'];
                if(file_exists($deleteOldImage)){
                    File::delete($deleteOldImage);
                }
                $imageName = rand(99,99999).'-'.uniqid().'.'.$image->getClientOriginalExtension();
                $imagePath = 'images/team/'.$imageName;
                Image::make($image)->resize(600,600)->save($imagePath);
            }else{
                $imageName = $editData['image'];
            }

            $team = Team::findOrFail($id);
            $team->name = $data['name'];
            $team->designation = $data['designation'];
            $team->mini_description = $data['mini_description'];
            $team->image =  $imageName ;
            $team->save();
            Session::flash('message','Team Member Successfully Updated');
            return redirect('/admin/team');
        }
        return view('backend.team.edit_team',compact('editData'));
    }

    // delete team
    public function deleteTeam($id=null){
       $team = Team::findOrFail($id);
       $deleteImage = 'images/team/'.$team['image'];
                if(file_exists($deleteImage)){
                    File::delete($deleteImage);
                }
            $team->delete();
            Session::flash('message','Team Member Successfully Deleted');
            return redirect('/admin/team');
    }

    // view team details
    public function viewTeamDetails($id=null){
        $viewTeam = Team::findOrFail($id)->toArray();
        return view('backend.team.view_team_details',compact('viewTeam'));
    }
}
