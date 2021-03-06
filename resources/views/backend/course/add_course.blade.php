@extends('backend.layout.app')

@section('title','Add Course')
 

@section('main-content')
 <!-- Begin Page Content -->
 <div class="container-fluid">

   <!-- Page Heading -->
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
       <h1 class="h3 mb-0 text-gray-800">Add Course</h1>
   </div>

   <div class="card shadow mb-4">
      <div class="card-header py-3">
          <a class="btn btn-primary btn-sm" href="{{ url('admin/courses') }}">Back to Course</a>
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
                  <form action="{{url('admin/add-course')}}" method="post">
                   @csrf 
                     <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" value="{{old('title')}}" class="form-control" placeholder="Enter Title">
                     </div>

                     <div class="form-group">
                        <label for="course_fee">Course Fee</label>
                        <input type="text" name="course_fee" value="{{old('course_fee')}}" class="form-control" placeholder="Enter Course Fee">
                     </div>

                     <div class="form-group">
                        <label for="url">Mini Title</label>
                        <input type="text" name="mini_title" value="{{old('mini_title')}}" class="form-control" placeholder="Enter Mini Title">
                     </div>

                     <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" class="form-control" rows="6">{{old('description')}}</textarea>
                     </div>

                     <div class="form-group">
                        <input type="submit" value="Add Course" class="btn btn-primary">
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



