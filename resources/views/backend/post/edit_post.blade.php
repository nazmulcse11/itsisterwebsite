@extends('backend.layout.app')

@section('title','Edit Post')
 

@section('main-content')
 <!-- Begin Page Content -->
 <div class="container-fluid">

   <!-- Page Heading -->
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
       <h1 class="h3 mb-0 text-gray-800">Edit Post</h1>
   </div>

   <div class="card shadow mb-4">
      <div class="card-header py-3">
          <a class="btn btn-primary btn-sm" href="{{ url('admin/posts') }}">Back to Post</a>
      </div>
      <div class="card-body">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  @if ($errors->any())
                     <div class="alert alert-danger">
                        <ul>
                              @foreach ($errors->all() as $error)
                                 <li>{{ $error }}</li>
                              @endforeach
                        </ul>
                     </div>
                  @endif
                  <form action="{{url('admin/edit-post/'.$editData['id']) }}" method="post" enctype="multipart/form-data">
                   @csrf 
                     <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" value="{{ $editData['title'] }}" class="form-control" placeholder="Enter Title">
                     </div>

                     <div class="form-group">
                        <label for="url">Url</label>
                        <input type="text" name="url" value="{{ $editData['url'] }}" class="form-control" placeholder="Enter Url">
                     </div>

                     <div class="form-group">
                        <label for="title">Image</label>
                        <input type="file" name="image" class="form-control">
                     </div>
                     <span><img style="width:100px; margin-bottom:10px;" src="{{url('images/post/'.$editData['image']) }}"></span>

                     <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" class="form-control" rows="6">{{ $editData['description'] }}</textarea>
                     </div>

                     <div class="form-group">
                        <input type="submit" value="Edit Post" class="btn btn-primary">
                     </div>

                  </form>
               </div>
            </div>
         </div>
      </div>
  </div>



</div>
<!-- /.container-fluid -->
@endsection



