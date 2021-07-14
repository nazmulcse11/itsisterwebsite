  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-newsletter">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6">

            @if(Session::has('success_message'))
            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
               {{ Session::get('success_message') }}
               <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            @endif

            @if(Session::has('error_message'))
            <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
               {{ Session::get('error_message') }}
               <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            @endif

            <h4>Stay Connected With Us</h4>
            <p>Subscribe us for getting our latest course offer and services </p>

            <form id="emailForm" action="{{ url('/subscribe-us') }}" method="post">
              @csrf
              <input type="email" id="email" name="email"><input type="submit" value="Subscribe">
            </form>

          </div>
        </div>
      </div>
    </div>

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>IT-Sister</h3>
            <p>
              Barashar Burichong <br>
              Cumilla<br>
              Bangladesh<br><br>
              <strong>Phone:</strong> 01638-926758<br>
              <strong>Email:</strong> info@itsistercomputers.com<br>
            </p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="fas fa-angle-right"></i> <a href="{{ url('/') }}">Home</a></li>
              <li><i class="fas fa-angle-right"></i> <a href="{{ url('/about-us') }}">About us</a></li>
              <li><i class="fas fa-angle-right"></i> <a href="{{ url('/blog/all-posts') }}">Blog</a></li>
              <li><i class="fas fa-angle-right"></i> <a href="{{ url('/contact-us') }}">Contact</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              @if(!empty($footerServices))
                @foreach($footerServices as $serv)
                <li><i class="fas fa-angle-right"></i> <a href="{{ url('/service/'.$serv['url']) }}">{{ $serv['title'] }}</a></li>
                @endforeach
              @endif
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Social Networks</h4>
            <p>Follow us on </p>
            <div class="social-links mt-3">
              <a href="javascript:void(0)" class="twitter"><i class="fab fa-twitter"></i></a>
              <a href="javascript:void(0)" class="facebook"><i class="fab fa-facebook"></i></a>
              <a href="javascript:void(0)" class="instagram"><i class="fab fa-instagram"></i></a>
              <a href="javascript:void(0)" class="google-plus"><i class="fab fa-skype"></i></a>
              <a href="javascript:void(0)" class="linkedin"><i class="fab fa-linkedin"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="container footer-bottom clearfix">
      <div class="copyright">
        &copy; Copyright <strong><span>it-sister</span></strong>. All Rights Reserved
      </div>
    </div>
  </footer><!-- End Footer -->