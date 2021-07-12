@extends('backend.layout.app')

@section('title','Add About')
 

@section('main-content')
 <!-- Begin Page Content -->
 <div class="container-fluid">

   <!-- Page Heading -->
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
       <h1 class="h3 mb-0 text-gray-800">Add About</h1>
   </div>

   <div class="card shadow mb-4">
      <div class="card-header py-3">
          <a class="btn btn-primary btn-sm" href="{{ url('admin/about') }}">Back to About</a>
      </div>
      <div class="card-body">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  @if ($errors->any())
                     <div class="alert alert-danger">
                        <ul>
                              @foreach ($errors->all() as $error)
                                 <li>{{ $error }}</li>
                              @endforeach
                        </ul>
                     </div>
                  @endif
                  <form action="{{url('admin/add-about')}}" method="post">
                   @csrf 
                     <div class="form-group">
                        <label for="who_we_are">Who We Are</label>
                        <textarea name="who_we_are" class="form-control" rows="5">{{old('who_we_are')}}</textarea>
                     </div>
                     <div class="form-group">
                        <label for="why_choose_us">Why Choose Us</label>
                        <textarea name="why_choose_us" class="form-control" rows="5">{{old('why_choose_us')}}</textarea>
                     </div>

                     <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" class="form-control" rows="6">{{old('description')}}</textarea>
                     </div>

                     <div class="form-group">
                        <input type="submit" value="Add About" class="btn btn-primary">
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



