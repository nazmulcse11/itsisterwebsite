@extends('frontend.layout.app')

@section('title','About Us')

@section('content')

<main id="main">
      <!-- ======= Breadcrumbs ======= -->
      <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
  
          <ol>
            <li><a href="{{url('/')}}">Home</a></li>
            <li>About Us</li>
          </ol>
        </div>
      </section><!-- End Breadcrumbs -->
  
      <!-- ======= Contact Section ======= -->
      <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">
          <div class="row">
            <div class="section-title">
              <h2>About Us</h2>
            </div>

            <div class="col-sm-12">
              {!! $about['description'] !!}
            </div>

          </div>
        </div>
      </section>
      <!-- End Contact Section -->
</main><!-- End #main -->

@endsection