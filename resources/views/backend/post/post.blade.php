@extends('backend.layout.app')

@section('title','Post')
 

@section('main-content')
  <!-- Begin Page Content -->
<div class="container-fluid">

   <!-- Page Heading -->
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
       <h1 class="h3 mb-0 text-gray-800">Post</h1>
   </div>
   <div class="card shadow mb-4">
      <div class="card-header py-3">
          <a class="btn btn-primary btn-sm" href="{{ url('/admin/add-post')}}">Add Post</a>
          @if(Session::has('message'))
          <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
             {{ Session::get('message') }}
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
             </button>
           </div>
           @endif
      </div>

      <div class="card-body">
          <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                      <tr>
                          <th>No</th>
                          <th>Title</th>
                          <th>Status</th>
                          <th>Image</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tfoot>
                      <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Image</th>
                        <th>Action</th>
                      </tr>
                  </tfoot>
                  <tbody>
                      @foreach($posts as $key=>$post)
                      <tr>
                         <td>{{ $key+1 }}</td>
                         <td>{{ $post['title'] }}</td>
                         <td>
                            @if($post['status'] == 0)
                            <a class="btn btn-danger btn-sm" href="{{ url('/admin/update-post-status/'.$post['id']) }}" onclick="return confirm('Are you sure to change status !')">Inactive</a>
                            @else 
                            <a class="btn btn-success btn-sm" href="{{ url('/admin/update-post-status/'.$post['id']) }}" onclick="return confirm('Are you sure to change status !')">Active</a>
                            @endif
                        </td>
                         <td><img style="width:100px;" src="{{ url('images/post/'.$post['image'] ) }}"></td>
                         <td>
                            <a class="btn btn-success btn-sm" href="{{ url('/admin/view-post-details/'.$post['id']) }}"><i class="fa fa-eye"></i></a>
                            <a class="btn btn-primary btn-sm" href="{{ url('admin/edit-post/'.$post['id']) }}"><i class="fa fa-edit"></i></a>
                            <a class="btn btn-danger btn-sm" href="{{ url('admin/delete-post/'.$post['id']) }}" onclick="return confirm('Are you sure to delete !!')"><i class="fa fa-times"></i></a>
                         </td>
                     </tr>
                     @endforeach
                  </tbody>
              </table>
          </div>
      </div>
  </div>

</div>
<!-- /.container-fluid -->
@endsection

