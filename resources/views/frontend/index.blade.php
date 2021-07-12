 @extends('frontend.layout.app')

 @section('title','Index')

 @section('content')
 <!-- ======= Hero Section ======= -->
 <section id="hero" class="d-flex align-items-center">

   <div class="container">
     <div class="row">
       <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
         <h1>{{ $slider['title'] }}</h1>
         <h2>{{ $slider['sub_title'] }}</h2>
         <div class="d-flex justify-content-center justify-content-lg-start">
           <a href="javascript:void(0)" class="btn-get-started scrollto">Get Started</a>
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
           <a href="javascript:void(0)" class="btn-learn-more">About Us</a>
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
         <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
       </div>

       <div class="row">
         <div class="col-xl-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
           <div class="icon-box">
             <div class="icon"><i class="bx bxl-dribbble"></i></div>
             <h4><a href="">UI-UX Design</a></h4>
             <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
             <a class="read-more btn" href="#">Read More</a>
           </div>
         </div>

         <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
           <div class="icon-box">
             <div class="icon"><i class="bx bx-file"></i></div>
             <h4><a href="">Graphics Design</a></h4>
             <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p>
             <a class="read-more btn" href="#">Read More</a>
           </div>
         </div>

         <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in" data-aos-delay="300">
           <div class="icon-box">
             <div class="icon"><i class="bx bx-tachometer"></i></div>
             <h4><a href="">Animation</a></h4>
             <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia</p>
             <a class="read-more btn" href="#">Read More</a>
           </div>
         </div>

         <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in" data-aos-delay="400">
           <div class="icon-box">
             <div class="icon"><i class="bx bx-layer"></i></div>
             <h4><a href="">Photoshop</a></h4>
             <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis</p>
             <a class="read-more btn" href="#">Read More</a>
           </div>
         </div>

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
           <p> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
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
         <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
       </div>

       <div class="row">

         <div class="col-lg-6">
           <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="100">
             <div class="pic"><img src="assets/img/team/team-1.jpg" class="img-fluid" alt=""></div>
             <div class="member-info">
               <h4>Walter White</h4>
               <span>Chief Executive Officer</span>
               <p>Explicabo voluptatem mollitia et repellat qui dolorum quasi</p>
               <div class="social">
                 <a href=""><i class="ri-twitter-fill"></i></a>
                 <a href=""><i class="ri-facebook-fill"></i></a>
                 <a href=""><i class="ri-instagram-fill"></i></a>
                 <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
               </div>
             </div>
           </div>
         </div>

         <div class="col-lg-6 mt-4 mt-lg-0">
           <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="200">
             <div class="pic"><img src="assets/img/team/team-2.jpg" class="img-fluid" alt=""></div>
             <div class="member-info">
               <h4>Sarah Jhonson</h4>
               <span>Product Manager</span>
               <p>Aut maiores voluptates amet et quis praesentium qui senda para</p>
               <div class="social">
                 <a href=""><i class="ri-twitter-fill"></i></a>
                 <a href=""><i class="ri-facebook-fill"></i></a>
                 <a href=""><i class="ri-instagram-fill"></i></a>
                 <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
               </div>
             </div>
           </div>
         </div>

         <div class="col-lg-6 mt-4">
           <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="300">
             <div class="pic"><img src="assets/img/team/team-3.jpg" class="img-fluid" alt=""></div>
             <div class="member-info">
               <h4>William Anderson</h4>
               <span>CTO</span>
               <p>Quisquam facilis cum velit laborum corrupti fuga rerum quia</p>
               <div class="social">
                 <a href=""><i class="ri-twitter-fill"></i></a>
                 <a href=""><i class="ri-facebook-fill"></i></a>
                 <a href=""><i class="ri-instagram-fill"></i></a>
                 <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
               </div>
             </div>
           </div>
         </div>

         <div class="col-lg-6 mt-4">
           <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="400">
             <div class="pic"><img src="assets/img/team/team-4.jpg" class="img-fluid" alt=""></div>
             <div class="member-info">
               <h4>Amanda Jepson</h4>
               <span>Accountant</span>
               <p>Dolorum tempora officiis odit laborum officiis et et accusamus</p>
               <div class="social">
                 <a href=""><i class="ri-twitter-fill"></i></a>
                 <a href=""><i class="ri-facebook-fill"></i></a>
                 <a href=""><i class="ri-instagram-fill"></i></a>
                 <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
               </div>
             </div>
           </div>
         </div>

       </div>

     </div>
   </section>
   <!-- End Team Section -->

   <!-- ======= Pricing Section ======= -->
   <section id="pricing" class="pricing">
     <div class="container" data-aos="fade-up">

       <div class="section-title">
         <h2>Courses</h2>
         <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
       </div>

       <div class="row">

         <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
           <div class="box">
             <h3>UI-UX Design</h3>
             <h4><sup>BDT: 5000</sup><span>Full Course</span></h4>
             <ul>
               <li><i class="bx bx-check"></i> Quam adipiscing vitae proin</li>
               <li><i class="bx bx-check"></i> Nec feugiat nisl pretium</li>
               <li><i class="bx bx-check"></i> Nulla at volutpat diam uteera</li>
               <li class="na"><i class="bx bx-x"></i> <span>Pharetra massa massa ultricies</span></li>
               <li class="na"><i class="bx bx-x"></i> <span>Massa ultricies mi quis hendrerit</span></li>
             </ul>
             <a href="#" class="buy-btn">Get Started</a>
           </div>
         </div>

         <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="200">
           <div class="box featured">
             <h3>Graphics Design</h3>
             <h4><sup>BDT: 5000</sup><span>Full Course</span></h4>
             <ul>
               <li><i class="bx bx-check"></i> Quam adipiscing vitae proin</li>
               <li><i class="bx bx-check"></i> Nec feugiat nisl pretium</li>
               <li><i class="bx bx-check"></i> Nulla at volutpat diam uteera</li>
               <li><i class="bx bx-check"></i> Pharetra massa massa ultricies</li>
               <li><i class="bx bx-check"></i> Massa ultricies mi quis hendrerit</li>
             </ul>
             <a href="#" class="buy-btn">Get Started</a>
           </div>
         </div>

         <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="300">
           <div class="box">
             <h3>Animation</h3>
             <h4><sup>BDT: 5000</sup><span>Full Course</span></h4>
             <ul>
               <li><i class="bx bx-check"></i> Quam adipiscing vitae proin</li>
               <li><i class="bx bx-check"></i> Nec feugiat nisl pretium</li>
               <li><i class="bx bx-check"></i> Nulla at volutpat diam uteera</li>
               <li><i class="bx bx-check"></i> Pharetra massa massa ultricies</li>
               <li><i class="bx bx-check"></i> Massa ultricies mi quis hendrerit</li>
             </ul>
             <a href="#" class="buy-btn">Get Started</a>
           </div>
         </div>

       </div>

     </div>
   </section>
   <!-- End Pricing Section -->

 </main><!-- End #main -->

 @endsection