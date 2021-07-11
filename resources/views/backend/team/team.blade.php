@extends('backend.layout.app')

@section('title','Team')
 

@section('main-content')
  <!-- Begin Page Content -->
<div class="container-fluid">

   <!-- Page Heading -->
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
       <h1 class="h3 mb-0 text-gray-800">Team</h1>
   </div>
   <div class="card shadow mb-4">
      <div class="card-header py-3">
          <a class="btn btn-primary btn-sm" href="{{ url('/admin/add-team')}}">Add Team</a>
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
                          <th>Name</th>
                          <th>Designation</th>
                          <th>Mini Description</th>
                          <th>Image</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tfoot>
                      <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Designation</th>
                        <th>Mini Description</th>
                        <th>Image</th>
                        <th>Action</th>
                      </tr>
                  </tfoot>
                  <tbody>
                      @foreach($teams as $key=>$team)
                      <tr>
                         <td>{{ $key+1 }}</td>
                         <td>{{ $team['name'] }}</td>
                         <td>{{ $team['designation'] }}</td>
                         <td>{{ Str::limit($team['mini_description'],20) }}</td>
                         <td><img style="width:50px;" src="{{ asset('images/team/'.$team['image'] ) }}" alt="{{$team['image']}}"></td>
                         <td>
                            <a class="btn btn-success btn-sm" href="{{ url('/admin/view-team-details/'.$team['id']) }}"><i class="fa fa-eye"></i></a>
                            <a class="btn btn-primary btn-sm" href="{{ url('admin/edit-team/'.$team['id']) }}"><i class="fa fa-edit"></i></a>
                            <a class="btn btn-danger btn-sm" href="{{ url('admin/delete-team/'.$team['id']) }}" onclick="return confirm('Are you sure to delete !!')"><i class="fa fa-times"></i></a>
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

