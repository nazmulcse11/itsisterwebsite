@extends('backend.layout.app')

@section('title','View About Details')
 

@section('main-content')
  <!-- Begin Page Content -->
<div class="container-fluid">

   <!-- Page Heading -->
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
       <h1 class="h3 mb-0 text-gray-800">View About Details</h1>
   </div>
   <div class="card shadow mb-4">
      <div class="card-header py-3">
          <a class="btn btn-primary btn-sm" href="{{ url('/admin/about')}}">Go Back</a>
      </div>
      
      <div class="card-body">
         <h4>Title:</h4>
         <p>{{ $viewAbout['title'] }}</p>
         <hr>

         <h4>Description:</h4>
         <p>{{ $viewAbout['description'] }}</p>
         <hr>

      </div>
  </div>

</div>
<!-- /.container-fluid -->
@endsection

