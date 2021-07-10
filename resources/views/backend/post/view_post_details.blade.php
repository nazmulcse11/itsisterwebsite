@extends('backend.layout.app')

@section('title','View Slider Details')
 

@section('main-content')
  <!-- Begin Page Content -->
<div class="container-fluid">

   <!-- Page Heading -->
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
       <h1 class="h3 mb-0 text-gray-800">View Post Details</h1>
   </div>
   <div class="card shadow mb-4">
      <div class="card-header py-3">
          <a class="btn btn-primary btn-sm" href="{{ url('/admin/posts')}}">Go Back</a>
      </div>
      
      <div class="card-body">
         <h4>Title:</h4>
         <p>{{ $viewPost['title'] }}</p>
         <hr>

         <h4>Url:</h4>
         <p>{{ $viewPost['url'] }}</p>
         <hr>
         
         <h4>Status:</h4>
         @if($viewPost['status'] == 0)
         <p>Inactive</p>
         @endif

         @if($viewPost['status'] == 1)
         <p>Active</p>
         @endif
         <hr>

         <h4>Image:</h4>
         <p><img style="width:500px;" src="{{url('images/post/'.$viewPost['image']) }}" alt=""></p>
         <hr>

         <h4>Description:</h4>
         <p>{!! $viewPost['description'] !!}</p>
         <hr>

      </div>
  </div>

</div>
<!-- /.container-fluid -->
@endsection

