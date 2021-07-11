@extends('backend.layout.app')

@section('title','Update User Details')
 

@section('main-content')
 <!-- Begin Page Content -->
 <div class="container-fluid">

   <!-- Page Heading -->
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
       <h1 class="h3 mb-0 text-gray-800">Update User Details</h1>
   </div>

   <div class="card shadow mb-4">
      <div class="card-header py-3">
          <a class="btn btn-primary btn-sm" href="{{ url('admin/user') }}">Back to User</a>
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
                  @if(Session::has('message'))
                     <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                        {{ Session::get('message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                        </button>
                     </div>
                  @endif
                  <form action="{{url('admin/update-details/'.Auth::user()->id)}}" method="post" enctype="multipart/form-data">
                   @csrf 
                   <div class="form-group">
                     <label for="email">Email</label>
                     <input type="text" name="email" value="{{ $editData['email'] }}" class="form-control" disabled>
                  </div>

                     <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text" name="name" value="{{ $editData['name'] }}"  class="form-control" placeholder="Enter Your Name">
                     </div>

                     <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" name="phone" value="{{ $editData['phone'] }}"  class="form-control" placeholder="Enter Your Phone">
                     </div>

                     <div class="form-group">
                        <label for="name">Profile Image</label>
                        <input type="file" name="image" class="form-control" placeholder="EnterYour Profile Image">
                     </div>
                        

                     <div class="form-group">
                        <input type="submit" value="Update Details" class="btn btn-primary">
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



