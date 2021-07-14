@extends('frontend.layout.app')

@section('title','Service')

@section('content')

<main id="main">
      <!-- ======= Breadcrumbs ======= -->
      <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
  
          <ol>
            <li><a href="{{url('/')}}">Home</a></li>
            <li>Service</li>
          </ol>
        </div>
      </section><!-- End Breadcrumbs -->
  
      <!-- ======= Contact Section ======= -->
      <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">
          <div class="row">

            <div class="section-title">
              <h2>{{ $service['title'] }}</h2>
            </div>

               {!! $service['description'] !!}
            </div>

          </div>
        </div>
      </section>
      <!-- End Contact Section -->
</main><!-- End #main -->

@endsection