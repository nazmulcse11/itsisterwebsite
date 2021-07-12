@extends('backend.layout.app')

@section('title','Edit Section')
 

@section('main-content')
 <!-- Begin Page Content -->
 <div class="container-fluid">

   <!-- Page Heading -->
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
       <h1 class="h3 mb-0 text-gray-800">Edit Section</h1>
   </div>

   <div class="card shadow mb-4">
      <div class="card-header py-3">
          <a class="btn btn-primary btn-sm" href="{{ url('admin/section') }}">Back to Section</a>
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
                  <form action="{{url('admin/edit-section/'.$editData['id'] )}}" method="post">
                   @csrf 
                     <div class="form-group">
                        <label for="type">Type</label>
                        <input type="text" name="type" value="{{ $editData['type'] }}" class="form-control" placeholder="Enter Type">
                     </div>

                     <div class="form-group">
                        <label for="mini_description">Mini Description</label>
                        <textarea name="mini_description" class="form-control" rows="6">{{ $editData['mini_description'] }}</textarea>
                     </div>

                     <div class="form-group">
                        <input type="submit" value="Edit Section" class="btn btn-primary">
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



