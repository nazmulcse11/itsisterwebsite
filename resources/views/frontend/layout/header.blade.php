  <!-- ======= Header ======= -->
  <header style="background:#BAB9B9" id="header" class="fixed-top header-inner-pages">
    <div class="container d-flex align-items-center">

      {{-- <h1 class="logo me-auto"><a href="{{ url('/')}}">IT-Sister</a></h1> --}}
      <!-- Uncomment below if you prefer to use an image logo -->
      <a href="{{ url('/') }}" class="logo me-auto"><img src="{{ url('frontend/assets/img/logo.png') }}" class="img-fluid"></a>
      
      <nav id="navbar" class="navbar">
        <ul>
          @if(!empty($slider) || !empty($about)) 
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
          <li><a class="nav-link scrollto" href="#team">Team</a></li>
          <li><a class="nav-link scrollto"  href="#pricing">Courses</a></li>
          <li><a class="nav-link scrollto" href="{{ url('/blog/all-posts') }}">Blog</a></li>
          <li><a class="nav-link scrollto" href="{{ url('/contact-us')}}">Contact</a></li>
          @else 
            <li><a class="nav-link scrollto active" href="{{url('/')}}">Home</a></li>
            <li><a class="nav-link scrollto" href="{{url('/about-us')}}">About</a></li>
            <li><a class="nav-link scrollto" href="{{ url('/blog/all-posts') }}">Blog</a></li>
            <li><a class="nav-link scrollto" href="{{ url('/contact-us')}}">Contact</a></li>
          @endif    
        </ul> 
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      

    </div>
  </header><!-- End Header -->