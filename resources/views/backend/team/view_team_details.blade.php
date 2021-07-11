@extends('backend.layout.app')

@section('title','View Team Details')
 

@section('main-content')
  <!-- Begin Page Content -->
<div class="container-fluid">

   <!-- Page Heading -->
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
       <h1 class="h3 mb-0 text-gray-800">View Team Details</h1>
   </div>
   <div class="card shadow mb-4">
      <div class="card-header py-3">
          <a class="btn btn-primary btn-sm" href="{{ url('/admin/team')}}">Go Back</a>
      </div>
      
      <div class="card-body">
         <h4>Name:</h4>
         <p>{{ $viewTeam['name'] }}</p>
         <hr>

         <h4>Designation:</h4>
         <p>{{ $viewTeam['designation'] }}</p>
         <hr>

         <h4>Mini Description:</h4>
         <p>{{ $viewTeam['mini_description'] }}</p>
         <hr>
        
         <h4>Image:</h4>
         <p><img style="width:500px;" src="{{url('images/team/'.$viewTeam['image']) }}" alt=""></p>
         <hr>

      </div>
  </div>

</div>
<!-- /.container-fluid -->
@endsection

