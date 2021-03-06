@extends('backend.layout.app')

@section('title','Slider')
 

@section('main-content')
  <!-- Begin Page Content -->
<div class="container-fluid">

   <!-- Page Heading -->
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
       <h1 class="h3 mb-0 text-gray-800">Slider</h1>
   </div>
   <div class="card shadow mb-4">
      <div class="card-header py-3">
          <a class="btn btn-primary btn-sm" href="{{ url('/admin/add-slider')}}">Add Slider</a>
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
                          <th>Sub Title</th>
                          <th>Status</th>
                          <th>Image</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tfoot>
                      <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>Sub Title</th>
                        <th>Status</th>
                        <th>Image</th>
                        <th>Action</th>
                      </tr>
                  </tfoot>
                  <tbody>
                      @foreach($sliders as $key=>$slider)
                      <tr>
                         <td>{{ $key+1 }}</td>
                         <td>{{ Str::limit($slider['title'],20) }}</td>
                         <td>{{ Str::limit($slider['sub_title'],20) }}</td>

                         <td>
                             @if($slider['status'] == 0)
                             <a class="btn btn-danger btn-sm" href="{{ url('/admin/update-slider-status/'.$slider['id']) }}" onclick="return confirm('Are you sure to change status !')">Inactive</a>
                             @else 
                             <a class="btn btn-success btn-sm" href="{{ url('/admin/update-slider-status/'.$slider['id']) }}" onclick="return confirm('Are you sure to change status !')">Active</a>
                             @endif
                         </td>

                         <td><img style="width:50px;" src="{{ asset('images/slider/'.$slider['image'] ) }}" alt="{{$slider['image']}}"></td>
                         <td>
                            <a class="btn btn-success btn-sm" href="{{ url('/admin/view-slider-details/'.$slider['id']) }}"><i class="fa fa-eye"></i></a>
                            <a class="btn btn-primary btn-sm" href="{{ url('admin/edit-slider/'.$slider['id']) }}"><i class="fa fa-edit"></i></a>
                            <a class="btn btn-danger btn-sm" href="{{ url('admin/delete-slider/'.$slider['id']) }}" onclick="return confirm('Are you sure to delete !!')"><i class="fa fa-times"></i></a>
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

