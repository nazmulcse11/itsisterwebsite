 @extends('frontend.layout.app')

 @section('title','itsister-Provides web development services and best courses')

 @section('content')
 <!-- ======= Hero Section ======= -->
 <section style="background:#BAB9B9" id="hero" class="d-flex align-items-center">

   <div class="container">
     <div class="row">
       <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
         <h1>{{ $slider['title'] }}</h1>
         <h2>{{ $slider['sub_title'] }}</h2>
         <div class="d-flex justify-content-center justify-content-lg-start">
           <a href="{{ url('/contact-us') }}" class="btn-get-started scrollto">Get Started</a>
           {{-- <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="glightbox btn-watch-video"><i class="bi bi-play-circle"></i><span>Watch Video</span></a> --}}
         </div>
       </div>
       <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
         <img src="{{url('images/slider/'.$slider['image']) }}" class="img-fluid animated" alt="">
       </div>
     </div>
   </div>

 </section><!-- End Hero -->

 <main id="main">

   <!-- ======= Cliens Section ======= -->
   <section id="cliens" class="cliens section-bg">
     <div class="container">

      <div class="section-title">
        <h2>Our Clients</h2>
      </div>

       <div class="row" data-aos="zoom-in">
         @foreach($clients as $client)
            <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
               @if(!empty($client['url']))
               <a href="{{$client['url']}}" target="_blank">
                  <img src="{{url('images/client/'.$client['image']) }}" class="img-fluid">
               </a>
               @else
               <a href="javascript:void(0)">
                  <img src="{{url('images/client/'.$client['image']) }}" class="img-fluid">
               </a>
               @endif
            </div>
         @endforeach
       </div>

     </div>
   </section><!-- End Cliens Section -->

   <!-- ======= About Us Section ======= -->
   <section id="about" class="about">
     <div class="container" data-aos="fade-up">

       <div class="section-title">
         <h2>About Us</h2>
       </div>

       <div class="row content">
         <div class="col-lg-6">
           <h4>Who We are ?</h4>
           <p>{{$about['who_we_are']}}</p>
         </div>
         <div class="col-lg-6 pt-4 pt-lg-0">
           <h4>Why Choose Us ?</h4>
           <p><p>{{$about['why_choose_us']}}</p></p>
           <a href="{{url('/about-us')}}" class="btn-learn-more">Read More</a>
         </div>
       </div>

     </div>
   </section>
   <!-- End About Us Section -->

   <!-- ======= Services Section ======= -->
   <section id="services" class="services section-bg">
     <div class="container" data-aos="fade-up">

       <div class="section-title">
         <h2>Services</h2>
         <p>{{ $servicee['mini_description']}}</p>
       </div>

       <div class="row">
         @foreach($services as $service)
         <div class="col-xl-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
          <div class="icon-box">
            <div class="icon"><i class="{{ $service['icon'] }}"></i></div>
            <h4><a href="{{ url('/service/'.$service['url']) }}">{{$service['title']}}</a></h4>
            <p>{!! Str::limit($service['description'],100) !!}</p>
            <a class="read-more btn" href="{{ url('/service/'.$service['url'])}}">Read More</a>
          </div>
        </div>
        @endforeach
       </div>

     </div>
   </section>
   <!-- End Services Section -->

   <!-- ======= Cta Section ======= -->
   <section id="cta" class="cta">
     <div class="container" data-aos="zoom-in">

       <div class="row">
         <div class="col-lg-9 text-center text-lg-start">
           <h3>Call To Action</h3>
           <p>{{ $callToAction['mini_description'] }}</p>
         </div>
         <div class="col-lg-3 cta-btn-container text-center">
           <a class="cta-btn align-middle" href="#">Call To Action</a>
         </div>
       </div>

     </div>
   </section>
   <!-- End Cta Section -->

   <!-- ======= Team Section ======= -->
   <section id="team" class="team section-bg">
     <div class="container" data-aos="fade-up">

       <div class="section-title">
         <h2>Team</h2>
         <p>{{ $team['mini_description'] }}</p>
       </div>

       <div class="row">
         @foreach($teams as $team)
         <div class="col-lg-6">
           <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="100">
             <div class="pic"><img src="{{url('images/team/'.$team['image']) }}" class="img-fluid"></div>
             <div class="member-info">
               <h4>{{ $team['name'] }}</h4>
               <span>{{ $team['designation'] }}</span>
               <p><?php echo $team['mini_description'] ?></p>
               <div class="social">
                 <a href="javascript:void(0)"><i class="fab fa-twitter"></i></a>
                 <a href="javascript:void(0)"><i class="fab fa-facebook"></i></a>
                 <a href="javascript:void(0)"><i class="fab fa-instagram"></i></a>
                 <a href="javascript:void(0)"> <i class="fab fa-linkedin"></i> </a>
               </div>
             </div>
           </div>
         </div>
        @endforeach
       </div>

     </div>
   </section>
   <!-- End Team Section -->

   <!-- ======= Pricing Section ======= -->
   <section id="pricing" class="pricing">
     <div class="container" data-aos="fade-up">

       <div class="section-title">
         <h2>Courses</h2>
         <p>{{ $course['mini_description'] }}</p>
       </div>

       <div class="row">
        @foreach($courses as $course)
         <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
           <div class="box">
             <h3>{{ $course['title'] }}</h3>
             <h4><sup>BDT: {{ $course['course_fee'] }} </sup><span>{{ $course['mini_title'] }}</span></h4>
             <ul>
              <?php 
                  $descArray = explode(',',$course['description']);
                  foreach($descArray as $desc){ ?>
                    <li><i class="bx bx-check"></i> <?php echo $desc ?></li>
                <?php  } ?>
             </ul>
             <a href="#" class="buy-btn">Get Started</a>
           </div>
         </div>
        @endforeach
       </div>

     </div>
   </section>
   <!-- End Pricing Section -->

 </main><!-- End #main -->

 @endsection