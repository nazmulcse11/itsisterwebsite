@extends('backend.layout.app')

@section('title','View Section Details')
 

@section('main-content')
  <!-- Begin Page Content -->
<div class="container-fluid">

   <!-- Page Heading -->
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
       <h1 class="h3 mb-0 text-gray-800">View Section Details</h1>
   </div>
   <div class="card shadow mb-4">
      <div class="card-header py-3">
          <a class="btn btn-primary btn-sm" href="{{ url('/admin/section')}}">Go Back</a>
      </div>
      
      <div class="card-body">
         <h4>Type:</h4>
         <p>{{ $viewSection['type'] }}</p>
         <hr>

         <h4>Mini Description:</h4>
         <p>{{ $viewSection['mini_description'] }}</p>
         <hr>

      </div>
  </div>

</div>
<!-- /.container-fluid -->
@endsection

