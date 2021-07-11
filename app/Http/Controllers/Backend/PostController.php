<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Session;
use Image;
use File;

class PostController extends Controller
{
    // show/get/read/featch post
    public function post(){
        $posts = Post::latest()->get()->toArray();
        return view('backend.post.post',compact('posts'));
    }

    // Add Post
    public function addPost(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();

            $rules = [
                'title'=>'required|max:190',
                'url'=>'required|max:190',
                'description'=>'required',
            ];
            $customMessage = [
                'title.required'=>'Title is required',
                'title.max'=>'Title must not contain more than 190 charecters',
                'url.required'=>'Url is required',
                'url.max'=>'Url must not contain more than 190 charecters',
                'description.required'=>'Description is required',
            ];

            $this->validate($request,$rules,$customMessage);

            $image = $request->file('image');
            if(isset($image)){
                $imageName = rand(99,99999).'-'.uniqid().'.'.$image->getClientOriginalExtension();
                $imagePath = 'images/post/'.$imageName;
                Image::make($image)->resize(900,400)->save($imagePath);
            }else{
                $imageName = '';
            }

            $post = new Post();
            $post->title = $data['title'];
            $post->url = $data['url'];
            $post->status = 0;
            $post->description = $data['description'];
            $post->image =  $imageName ;
            $post->save();
            Session::flash('message','Post Successfully Added');
            return redirect('/admin/posts');
        }
        return view('backend.post.add_post');
    }

    // Edit Post
    public function editPost(Request $request, $id=null){
        $editData = Post::findOrFail($id)->toArray();
        if($request->isMethod('post')){
            $data = $request->all();

            $rules = [
                'title'=>'required|max:190',
                'url'=>'required|max:190',
                'description'=>'required',
            ];
            $customMessage = [
                'title.required'=>'Title is required',
                'title.max'=>'Title must not contain more than 190 charecters',
                'url.required'=>'Url is required',
                'url.max'=>'Url must not contain more than 190 charecters',
                'description.required'=>'Description is required',
            ];
            $this->validate($request,$rules,$customMessage);

            $image = $request->file('image');
            if(isset($image)){
                // delete old image when update image
                $deleteOldImage = 'images/post/'.$editData['image'];
                if(file_exists($deleteOldImage)){
                    File::delete($deleteOldImage);
                }
                $imageName = rand(99,99999).'-'.uniqid().'.'.$image->getClientOriginalExtension();
                $imagePath = 'images/post/'.$imageName;
                Image::make($image)->resize(900,400)->save($imagePath);
            }else{
                $imageName = $editData['image'];
            }

            $post = Post::findOrFail($id);
            $post->title = $data['title'];
            $post->url = $data['url'];
            $post->description = $data['description'];
            $post->image =  $imageName ;
            $post->save();
            Session::flash('message','Post Successfully Updated');
            return redirect('/admin/posts');
        }
        return view('backend.post.edit_post',compact('editData'));
    }

    // delete post
    public function deletePost($id=null){
        $post = Post::findOrFail($id);
        $deleteImage = 'images/post/'.$post['image'];
                 if(file_exists($deleteImage)){
                     File::delete($deleteImage);
                     
                 }
             $post->delete();
             Session::flash('message','Post Successfully Deleted');
             return redirect('/admin/posts');
     }

     // update post status
    public function updatePostStatus($id=null){
        $updatePostStatus = Post::findOrFail($id)->toArray();
        if($updatePostStatus['status'] == 0){
            $status = 1;
        }
        if($updatePostStatus['status'] == 1){
            $status = 0;
        }
        $post = Post::findOrFail($id);
        $post->status =  $status;
        $post->save();
        Session::flash('message','Post Status Successfully Updated');
        return redirect()->back();
    }

    // view slider details
    public function viewPostDetails($id=null){
        $viewPost = Post::findOrFail($id)->toArray();
        return view('backend.post.view_post_details',compact('viewPost'));
    }
}
