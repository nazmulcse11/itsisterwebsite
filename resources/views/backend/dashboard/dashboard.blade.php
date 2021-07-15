@extends('backend.layout.app')

@section('title','Dashboard')
 

@section('main-content')
  <!-- Begin Page Content -->
<div class="container-fluid">

   <!-- Page Heading -->
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
       <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
   </div>

   <!-- Content Row -->
   <div class="row">

       <!-- Earnings (Monthly) Card Example -->
       <div class="col-xl-3 col-md-6 mb-4">
           <div class="card border-left-primary shadow h-100 py-2">
               <div class="card-body">
                   <div class="row no-gutters align-items-center">
                       <div class="col mr-2">
                           <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                               Total Service</div>
                           <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalService }}</div>
                       </div>
                       <div class="col-auto">
                           <i class="fas fa-desktop fa-2x text-gray-300"></i>
                       </div>
                   </div>
               </div>
           </div>
       </div>

       <!-- Earnings (Monthly) Card Example -->
       <div class="col-xl-3 col-md-6 mb-4">
           <div class="card border-left-success shadow h-100 py-2">
               <div class="card-body">
                   <div class="row no-gutters align-items-center">
                       <div class="col mr-2">
                           <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                               Total Course</div>
                           <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $TotalCourse }}</div>
                       </div>
                       <div class="col-auto">
                           <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                       </div>
                   </div>
               </div>
           </div>
       </div>

       <!-- Earnings (Monthly) Card Example -->
       <div class="col-xl-3 col-md-6 mb-4">
           <div class="card border-left-info shadow h-100 py-2">
               <div class="card-body">
                   <div class="row no-gutters align-items-center">
                       <div class="col mr-2">
                           <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Post
                           </div>
                           <div class="row no-gutters align-items-center">
                               <div class="col-auto">
                                   <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $ToalPost }}</div>
                               </div>
                               <div class="col">
                                   <div class="progress progress-sm mr-2">
                                       <div class="progress-bar bg-info" role="progressbar"
                                           style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                           aria-valuemax="100"></div>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <div class="col-auto">
                           <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                       </div>
                   </div>
               </div>
           </div>
       </div>

       <!-- Pending Requests Card Example -->
       <div class="col-xl-3 col-md-6 mb-4">
           <div class="card border-left-warning shadow h-100 py-2">
               <div class="card-body">
                   <div class="row no-gutters align-items-center">
                       <div class="col mr-2">
                           <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                               Total Email</div>
                           <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $TotalEmail }}</div>
                       </div>
                       <div class="col-auto">
                        <i class="fas fa-envelope-square fa-2x text-gray-300"></i>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>

   <div class="row">
       {{-- //contact info --}}
       <div class="col-md-7">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h3>Contact Info</h3>
                @if(Session::has('contact_message'))
                <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                   {{ Session::get('contact_message') }}
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
                                <th>name</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>name</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach($contacts as $key=>$contact)
                            <tr>
                               <td>{{ $key+1 }}</td>
                               <td>{{ Str::limit($contact['name'],150) }}</td>
                               <td>{{ Str::limit($contact['email'],150) }}</td>
                               <td>
                                  <a class="btn btn-success btn-sm" href="{{ url('/admin/view-contact-details/'.$contact['id']) }}"><i class="fa fa-eye"></i></a>
                                  <a class="btn btn-danger btn-sm" href="{{ url('admin/delete-contact/'.$contact['id']) }}" onclick="return confirm('Are you sure to delete !!')"><i class="fa fa-times"></i></a>
                               </td>
                           </tr>
                           @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
       </div>

       {{-- //email info --}}
       <div class="col-md-5">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h3>Emails</h3>
                @if(Session::has('email_message'))
                <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                   {{ Session::get('email_message') }}
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
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach($emails as $key=>$email)
                            <tr>
                               <td>{{ $key+1 }}</td>
                               <td>{{ $email['email'] }}</td>
                               <td>
                                  <a class="btn btn-danger btn-sm" href="{{ url('admin/delete-email/'.$email['id']) }}" onclick="return confirm('Are you sure to delete !!')"><i class="fa fa-times"></i></a>
                               </td>
                           </tr>
                           @endforeach
                        </tbody>
                    </table>
                    {{ $emails->links() }}
                </div>
            </div>
        </div>
       </div>
   </div>

</div>
<!-- /.container-fluid -->
@endsection

