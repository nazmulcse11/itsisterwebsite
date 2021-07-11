@extends('backend.layout.app')

@section('title','Edit Client')
 

@section('main-content')
 <!-- Begin Page Content -->
 <div class="container-fluid">

   <!-- Page Heading -->
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
       <h1 class="h3 mb-0 text-gray-800">Edit Client</h1>
   </div>

   <div class="card shadow mb-4">
      <div class="card-header py-3">
          <a class="btn btn-primary btn-sm" href="{{ url('admin/client') }}">Back to Clientr</a>
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
                  <form action="{{url('admin/edit-client/'.$editData['id'])}}" method="post" enctype="multipart/form-data">
                   @csrf

                     <div class="form-group">
                        <label for="image">Client Image</label>
                        <input type="file" name="image" class="form-control">
                     </div>

                     <div class="form-group">
                        <label for="url">Client Url</label>
                        <input type="text" name="url" class="form-control" value="{{ $editData['url'] }}" placeholder="Enter url(optional)">
                     </div>

                     <div class="form-group">
                        <input type="submit" value="Edit Client" class="btn btn-primary">
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



