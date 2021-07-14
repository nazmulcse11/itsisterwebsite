@extends('frontend.layout.app')

@section('title','All Posts')

@section('content')

<main id="main">
      <!-- ======= Breadcrumbs ======= -->
      <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
  
          <ol>
            <li><a href="{{url('/')}}">Home</a></li>
            <li>All Post</li>
          </ol>
        </div>
      </section><!-- End Breadcrumbs -->
  
      <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>All Posts</h2>
        </div>

        <div class="row">
          @foreach($posts as $post)
          <div class="col-xl-3 col-md-6 d-flex align-items-stretch mb-5">
            <div class="icon-box">
              <h4><a href="">{{$post['title']}}</a></h4>
              <p>{!! Str::limit($post['description'],100) !!}</p>
              <a class="read-more btn" href="{{$post['url']}}">Read More</a>
            </div>
          </div>
          @endforeach

        </div>

      </div>
    </section>
    <!-- End Services Section -->

</main><!-- End #main -->

@endsection