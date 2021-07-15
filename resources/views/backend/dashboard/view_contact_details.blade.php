@extends('backend.layout.app')

@section('title','View Contact Details')
 

@section('main-content')
  <!-- Begin Page Content -->
<div class="container-fluid">

   <!-- Page Heading -->
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
       <h1 class="h3 mb-0 text-gray-800">View Contact Details</h1>
   </div>
   <div class="card shadow mb-4">
      <div class="card-header py-3">
          <a class="btn btn-primary btn-sm" href="{{ url('/admin/dashboard')}}">Go Back</a>
      </div>
      
      <div class="card-body">
         <h4>Name:</h4>
         <p>{{ $viewContact['name'] }}</p>
         <hr>

         <h4>Email:</h4>
         <p>{{ $viewContact['email'] }}</p>
         <hr>

         <h4>Subject:</h4>
         <p>{{ $viewContact['subject'] }}</p>
         <hr>

         <h4>Message:</h4>
         <p>{{ $viewContact['message'] }}</p>
         <hr>

      </div>
  </div>

</div>
<!-- /.container-fluid -->
@endsection

