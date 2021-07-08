@extends('backend.layout.app')

@section('title','Add About')
 

@section('main-content')
 <!-- Begin Page Content -->
 <div class="container-fluid">

   <!-- Page Heading -->
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
       <h1 class="h3 mb-0 text-gray-800">Add About</h1>
   </div>

   <div class="card shadow mb-4">
      <div class="card-header py-3">
          <a class="btn btn-primary btn-sm" href="{{ url('admin/about') }}">Back to Sliderr</a>
      </div>
      <div class="card-body">
         <div class="container">
            <div class="row">
               <div class="col-md-6">
                  @if ($errors->any())
                     <div class="alert alert-danger">
                        <ul>
                              @foreach ($errors->all() as $error)
                                 <li>{{ $error }}</li>
                              @endforeach
                        </ul>
                     </div>
                  @endif
                  <form action="{{url('admin/add-about')}}" method="post">
                   @csrf 
                     <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" placeholder="Enter Title">
                     </div>

                     <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" class="form-control" rows="6"></textarea>
                     </div>

                     <div class="form-group">
                        <input type="submit" value="Add About" class="btn btn-primary">
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



