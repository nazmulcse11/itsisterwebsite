<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use Session;

class ServiceController extends Controller
{
    public function service(){
        $services = Service::latest()->get()->toArray();
        return view('backend.service.service',compact('services'));
    }

    // add service
    public function addService(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();

            $rules = [
                'icon'=>'required',
                'title'=>'required|max:190',
                'url'=>'required|max:190',
                'description'=>'required',
            ];
            $customMessage = [
                'icon.required'=>'Icon is required',
                'title.required'=>'Title is required',
                'title.max'=>'Title must not contain more than 190 charecters',
                'url.required'=>'Url is required',
                'url.max'=>'Url must not contain more than 190 charecters',
                'description.required'=>'Description is required',
            ];

            $this->validate($request,$rules,$customMessage);

            $service = new Service();
            $service->icon = $data['icon'];
            $service->title = $data['title'];
            $service->url = $data['url'];
            $service->status = 0;
            $service->description = $data['description'];
            $service->save();
            Session::flash('message','Service Successfully Added');
            return redirect('/admin/service');
        }
        return view('backend.service.add_service');
    }

     // Edit Service
     public function editService(Request $request, $id=null){
        $editData = Service::findOrFail($id)->toArray();
        if($request->isMethod('post')){
            $data = $request->all();

            $rules = [
                'icon'=>'required',
                'title'=>'required|max:190',
                'url'=>'required|max:190',
                'description'=>'required',
            ];
            $customMessage = [
                'icon.required'=>'Icon is required',
                'title.required'=>'Title is required',
                'title.max'=>'Title must not contain more than 190 charecters',
                'url.required'=>'Url is required',
                'url.max'=>'Url must not contain more than 190 charecters',
                'description.required'=>'Description is required',
            ];
            $this->validate($request,$rules,$customMessage);

            $service = Service::findOrFail($id);
            $service->icon = $data['icon'];
            $service->title = $data['title'];
            $service->url = $data['url'];
            $service->description = $data['description'];
            $service->save();
            Session::flash('message','Service Successfully Updated');
            return redirect('/admin/service');
        }
        return view('backend.service.edit_service',compact('editData'));
    }

     // delete service
     public function deleteService($id=null){
        $service = Service::findOrFail($id)->delete();
        Session::flash('message','Service Successfully Deleted');
        return redirect('/admin/service');
     }

    // view service details
    public function viewServiceDetails($id=null){
        $viewService = Service::findOrFail($id)->toArray();
        return view('backend.service.view_service_details',compact('viewService'));
    }

    // update service status
    public function updateServiceStatus($id=null){
        $updateServiceStatus = Service::findOrFail($id)->toArray();
        if($updateServiceStatus['status'] == 0){
            $status = 1;
        }
        if($updateServiceStatus['status'] == 1){
            $status = 0;
        }
        $service = Service::findOrFail($id);
        $service->status =  $status;
        $service->save();
        Session::flash('message','Service Status Successfully Updated');
        return redirect()->back();
    }
}
