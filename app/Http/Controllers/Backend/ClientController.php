<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use Session;
use Image;
use File;

class ClientController extends Controller
{
    public function client(){
        $clients = Client::latest()->get()->toArray();
        return view('backend.client.client',compact('clients'));
    }
    
    // Add client
    public function addClient(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();

            $rules = [
                'image'=>'required',
            ];
            $customMessage = [
                'image.required'=>'Client Image is required',
            ];

            $this->validate($request,$rules,$customMessage);

            $image = $request->file('image');
            if(isset($image)){
                $imageName = rand(99,99999).'-'.uniqid().'.'.$image->getClientOriginalExtension();
                $imagePath = 'images/client/'.$imageName;
                Image::make($image)->resize(780,646)->save($imagePath);
            }else{
                $imageName = '';
            }

            $client = new client();
            $client->url = $data['url'];
            $client->image =  $imageName ;
            $client->save();
            Session::flash('message','Client Successfully Added');
            return redirect('/admin/client');
        }
        return view('backend.client.add_client');
    }

    // Edit client
    public function editClient(Request $request, $id=null){
        $editData = Client::findOrFail($id)->toArray();
        if($request->isMethod('post')){
            $data = $request->all();

            $image = $request->file('image');
            if(isset($image)){
                $deleteOldImage = 'images/client/'.$editData['image'];
                if(file_exists($deleteOldImage)){
                    File::delete($deleteOldImage);
                }
                $imageName = rand(99,99999).'-'.uniqid().'.'.$image->getClientOriginalExtension();
                $imagePath = 'images/client/'.$imageName;
                Image::make($image)->resize(400,173)->save($imagePath);
            }else{
                $imageName = $editData['image'];
            }

            $client = Client::findOrFail($id);
            $client->url = $data['url'];
            $client->image =  $imageName ;
            $client->save();
            Session::flash('message','Client Successfully Updated');
            return redirect('/admin/client');
        }
        return view('backend.client.edit_client',compact('editData'));
    }

    // delete client
    public function deleteclient($id=null){
       $client = client::findOrFail($id);
       $deleteImage = 'images/client/'.$client['image'];
                if(file_exists($deleteImage)){
                    File::delete($deleteImage); 
                }
            $client->delete();
            Session::flash('message','Client Successfully Deleted');
            return redirect('/admin/client');
    }
}
