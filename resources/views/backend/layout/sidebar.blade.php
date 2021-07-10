<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

   <!-- Sidebar - Brand -->
   <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
       <div class="sidebar-brand-icon rotate-n-15">
           <i class="fas fa-laugh-wink"></i>
       </div>
       <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
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
    <a class="nav-link" href="{{ url('/admin/slider') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Slider</span></a>
    </li>

    <li class="nav-item active">
        <a class="nav-link" href="{{ url('/admin/about') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>About</span></a>
    </li>

    <li class="nav-item active">
        <a class="nav-link" href="{{ url('/admin/service') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Service</span></a>
    </li>

    <li class="nav-item active">
        <a class="nav-link" href="{{ url('/admin/courses') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Courses</span></a>
    </li>

    <li class="nav-item active">
        <a class="nav-link" href="{{ url('/admin/posts') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Post</span></a>
    </li>

    <li class="nav-item active">
        <a class="nav-link" href="{{ url('/admin/user') }}">
        <i class="fas fa-user"></i>
        <span>User</span></a>
    </li>

</ul>
<!-- End of Sidebar -->