@extends('backend.layout.app')

@section('title','View Slider Details')
 

@section('main-content')
  <!-- Begin Page Content -->
<div class="container-fluid">

   <!-- Page Heading -->
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
       <h1 class="h3 mb-0 text-gray-800">View Slider Details</h1>
   </div>
   <div class="card shadow mb-4">
      <div class="card-header py-3">
          <a class="btn btn-primary btn-sm" href="{{ url('/admin/slider')}}">Go Back</a>
      </div>
      
      <div class="card-body">
         <h4>Title:</h4>
         <p>{{ $viewSlider['title'] }}</p>
         <hr>

         <h4>Sub Title:</h4>
         <p>{{ $viewSlider['sub_title'] }}</p>
         <hr>
         
         <h4>Status:</h4>
         @if($viewSlider['status'] == 0)
         <p>Inactive</p>
         @endif

         @if($viewSlider['status'] == 1)
         <p>Active</p>
         @endif
         <hr>

         <h4>Image:</h4>
         <p><img style="width:500px;" src="{{url('images/slider/'.$viewSlider['image']) }}" alt=""></p>
         <hr>

      </div>
  </div>

</div>
<!-- /.container-fluid -->
@endsection

