@extends('frontend.layout.app')

@section('title','Contact Us')

@section('content')

<main id="main">
      <!-- ======= Breadcrumbs ======= -->
      <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="{{url('/')}}">Home</a></li>
            <li>Contact Us</li>
          </ol>
        </div>
      </section><!-- End Breadcrumbs -->
   
      <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contact</h2>
          <p>Welcome to it-sister. You can contact us using below contact form. Please feel free 
             to ask your query.
          </p>
        </div>

        <div class="row">

          <div class="col-lg-5 d-flex align-items-stretch">
            <div class="info">

              <div class="address">
                <i class="fas fa-address-book"></i>
                <h4>Location:</h4>
                <p>Barashar, Burichong, Cumilla</p>
              </div>

              <div class="email">
               <i class="fas fa-envelope-square"></i>
                <h4>Email:</h4>
                <p>info@itsistercomputers.com</p>
              </div>

              <div class="phone">
                <i class="fas fa-phone"></i>
                <h4>Call:</h4>
                <p>01638-926758</p>
              </div>

            </div>
          </div>

          <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
             
            <form id="contactForm" action="{{url('/contact-us')}}" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="name">Your Name</label>
                  <input type="text" name="name" class="form-control" id="name">
                </div>
                <div class="form-group col-md-6">
                  <label for="name">Your Email</label>
                  <input type="email" class="form-control" name="email" id="email">
                </div>
              </div>
              <div class="form-group">
                <label for="name">Subject</label>
                <input type="text" class="form-control" name="subject" id="subject">
              </div>
              <div class="form-group">
                <label for="name">Message</label>
                <textarea class="form-control" name="message" id="message" rows="10"></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>

          </div>

        </div>

      </div>
    </section>
    <!-- End Contact Section -->

</main><!-- End #main -->

@endsection