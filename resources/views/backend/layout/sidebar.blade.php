<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

   <!-- Sidebar - Brand -->
   <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('admin/dashboard')}}">
       <div class="sidebar-brand-icon rotate-n-15">
           <i class="fas fa-laugh-wink"></i>
       </div>
       <div class="sidebar-brand-text mx-3">IT Sister</div>
   </a>

   <!-- Divider -->
   <hr class="sidebar-divider my-0">

   <!-- Nav Item - Dashboard -->
   <li class="nav-item active">
       <a class="nav-link" href="{{ url('/admin/dashboard') }}">
           <i class="fas fa-fw fa-tachometer-alt"></i>
           <span>Dashboard</span></a>
   </li>

   <li class="nav-item active">
        <a class="nav-link" href="{{ url('/admin/section') }}">
            <i class="fas fa-puzzle-piece"></i>
        <span>Section</span></a>
    </li>

   <li class="nav-item active">
    <a class="nav-link" href="{{ url('/admin/slider') }}">
        <i class="fas fa-sliders-h"></i>
        <span>Slider</span></a>
    </li>

    <li class="nav-item active">
        <a class="nav-link" href="{{ url('/admin/client') }}">
            <i class="fas fa-user-friends"></i>
            <span>Client</span></a>
        </li>

    <li class="nav-item active">
        <a class="nav-link" href="{{ url('/admin/about') }}">
            <i class="fas fa-eject"></i>
        <span>About</span></a>
    </li>

    <li class="nav-item active">
        <a class="nav-link" href="{{ url('/admin/service') }}">
            <i class="fab fa-servicestack"></i>
        <span>Service</span></a>
    </li>

    <li class="nav-item active">
        <a class="nav-link" href="{{ url('/admin/team') }}">
        <i class="fas fa-user-plus"></i>
        <span>Team</span></a>
    </li>

    <li class="nav-item active">
        <a class="nav-link" href="{{ url('/admin/courses') }}">
            <i class="fas fa-dollar-sign"></i>
        <span>Courses</span></a>
    </li>

    <li class="nav-item active">
        <a class="nav-link" href="{{ url('/admin/posts') }}">
            <i class="fas fa-plus"></i>
        <span>Post</span></a>
    </li>

    <li class="nav-item active">
        <a class="nav-link" href="{{ url('/admin/user') }}">
        <i class="fas fa-user"></i>
        <span>User</span></a>
    </li>

</ul>
<!-- End of Sidebar -->