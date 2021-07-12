@extends('backend.layout.app')

@section('title','Add User')
 

@section('main-content')
 <!-- Begin Page Content -->
 <div class="container-fluid">

   <!-- Page Heading -->
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
       <h1 class="h3 mb-0 text-gray-800">Add User</h1>
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
                  @if(Session::has('error_message'))
                  <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                     {{ Session::get('error_message') }}
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  @endif
                  <form action="{{url('admin/add-user')}}" method="post">
                   @csrf 
                     <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="Enter Admin Full Name">
                     </div>

                     <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" value="{{old('email')}}" class="form-control" placeholder="Enter Email">
                     </div>

                     <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Enter Password">
                     </div>

                     <div class="form-group">
                        <label for="confirm_password">Confirm Password</label>
                        <input type="password" name="confirm_password" class="form-control" placeholder="Enter Confirm Password">
                     </div>

                     <div class="form-group">
                        <input type="submit" value="Add User" class="btn btn-primary">
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



