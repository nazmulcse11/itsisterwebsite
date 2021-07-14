@extends('frontend.layout.app')

@section('title')
{{ $postDetails['title'] }}
@endsection

@section('content')

<main id="main">
      <!-- ======= Breadcrumbs ======= -->
      <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
  
          <ol>
            <li><a href="{{url('/')}}">Home</a></li>
            <li>Post Details</li>
          </ol>
        </div>
      </section><!-- End Breadcrumbs -->
  
      <!-- ======= Post Details Section ======= -->
    <section id="post-details" class="post-details">
      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-8">
              <h2 class="mb-3">{{ $postDetails['title'] }}</h2>
              <img src="{{ url('images/post/'.$postDetails['image']) }}">
              <p style="text-align:justify" class="mt-3"> {!! $postDetails['description'] !!}</p> 
          </div>

          <div class="col-lg-4">
            <div class="post-info">
              <h3>Related Posts</h3>
              <ul>
               @foreach($relatedPost as $post)
                <li><i class="ri-check-double-line"></i>
                  <a href="{{ $post['url'] }}">{{ $post['title'] }}</a>
               </li>
               @endforeach
              </ul>
            </div>

            {{-- <div class="post-description">
              <h2>Title</h2>
              <p>descrption</p>
            </div>
          </div> --}}

        </div>

      </div>
    </section><!-- End Post Details Section -->

</main><!-- End #main -->

@endsection