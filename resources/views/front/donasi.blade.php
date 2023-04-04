<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Donasi-Beranda</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets-3/img/favicon.png" rel="icon">
  <link href="assets-3/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets-3/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets-3/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets-3/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets-3/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets-3/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets-3/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets-3/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets-3/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <!-- Template Main CSS File -->
  <link href="assets-3/css/style.css" rel="stylesheet">
<style>
    .carousel-item .img-fluid {
  width:100%;
  height:auto;
}

/*
anchors are inline so you need ot make them block to go full width
*/
.carousel-item a {
  display: block;
  width:100%;
}

.submitbtn:disabled {
  opacity: 0.5; /* Ubah opasitas menjadi 50% */
  cursor: not-allowed; /* Ganti pointer menjadi not-allowed */
}
.carousel-caption h5 {
  font-size: 3rem;
  font-weight: bold;
  text-transform: uppercase;
  padding: 20px;
  background-color: rgba(24, 132, 203, 0.5);
  border-radius: 10px;
  color: white;
  position: relative;
  animation: slide 15s infinite;
}

@keyframes slide {
  0% {
    left: -100%;
  }
  100% {
    left: 100%;
  }


}
.bubble {
  width: 50px;
  height: 50px;
  background-color: #ffcc00;
  border-radius: 50%;
  position: relative;
  animation: bubble 1s ease-out infinite;
}

@keyframes bubble {
  0% {
    transform: scale(0);
    opacity: 0;
  }
  25% {
    transform: scale(1);
    opacity: 1;
  }
  100% {
    transform: scale(1.5);
    opacity: 0;
  }
}
</style>
  <!-- =======================================================
  * Template Name: Selecao
  * Updated: Mar 10 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/selecao-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center  header-transparent ">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <h1><a href="#">DONASI KITA</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>

          <li><a class="nav-link scrollto" href="#donasi">Donasi</a></li>

          <li><a class="nav-link scrollto" href="{{route('login')}}">Login</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex flex-column ">

        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-indicators">
            @foreach($slide as $index => $row)
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}" aria-current="{{ $index == 0 ? 'true' : 'false' }}" aria-label="Slide {{ $index + 1 }}"></button>
            @endforeach
          </div>
          <div class="carousel-inner">
            @foreach($slide as $index => $item)
            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">

              <img src="{{ asset('artikel/'.$item->gambar_slide) }}" class="d-block w-100" alt="gambar 800x400">
              <div class="carousel-caption d-none d-md-block">
                <div class="bubble"></div>
                <h5>{{$item->judul_slide}}</h5>
                {{-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p> --}}
              </div>
            </div>
            @endforeach
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>


    <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28 " preserveAspectRatio="none">
      <defs>
        <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
      </defs>
      <g class="wave1">
        <use xlink:href="#wave-path" x="50" y="3" fill="rgba(255,255,255, .1)">
      </g>
      <g class="wave2">
        <use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255, .2)">
      </g>
      <g class="wave3">
        <use xlink:href="#wave-path" x="50" y="9" fill="#fff">
      </g>
    </svg>

  </section><!-- End Hero -->

  <main id="main">

    {{-- <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="section-title" data-aos="zoom-out">
          <h2>About</h2>
          <p>Who we are</p>
        </div>

        <div class="row content" data-aos="fade-up">
          <div class="col-lg-6">
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
              magna aliqua.
            </p>
            <ul>
              <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat</li>
              <li><i class="ri-check-double-line"></i> Duis aute irure dolor in reprehenderit in voluptate velit</li>
              <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat</li>
            </ul>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0">
            <p>
              Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
              velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
              culpa qui officia deserunt mollit anim id est laborum.
            </p>
            <a href="#" class="btn-learn-more">Learn More</a>
          </div>
        </div>

      </div>
    </section><!-- End About Section --> --}}


    <!-- ======= Pricing Section ======= -->
    <section id="donasi" class="pricing">
      <div class="container">

        <div class="section-title" data-aos="zoom-out">
          <h2>CAMPAIGN</h2>
          <p>MARI MENOLONG BERSAMA</p>
        </div>

        <div class="row">


            @forelse ($even as $row)
          <div class="col-lg-3 col-md-6 mt-4 mt-md-0">
            <div class="box featured" data-aos="zoom-in" data-aos-delay="100">
              {{-- <h3>Business</h3> --}}
              <h3>{{$row->title}}</h3>

              <p>Deadline: <span id="deadline_{{$row->id}}">{{$row->deadline}}</span></p>
              {{-- <h4><sup>$</sup>19<span> / month</span></h4> --}}
              <ul>
                <li><h6>target donasi {{"Rp." .number_format($row->goals, 0, '.',',')}} dari  {{"Rp." .number_format($row->raised, 0, '.',',')}}</h6>
                </li>
                <li><img class="card-img-top" src="{{ asset('artikel/'.$row->thumbnail) }}" alt="Card image cap"></li>
                <li> <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="{{ $row->raised }}" aria-valuemin="0" aria-valuemax="{{ $row->goals }}" style="width: {{($row->raised / $row->goals)* 100}}%;">
                        {{-- <span>{{($row->raised / $row->goals)* 100}}%</span> --}}
                    </div>
                </div></li>

                <li class="bg-light">  <span class="badge badge-warning">
                    {{-- <div class="countdown" id="countdown_{{$row->id}}"></div> --}}

                    <div class="countdown"  id="countdown_{{$row->id}}"></div>
                    </span>
                    <div>

                <h4 class="mt-2" style="margin-top: -10px; font-size: 12px">{{ $row->created_at->diffForHumans() }}</h4></li>

                <li>@if($row->raised >= $row->goals)

                    <h5>donasi terpenuhi</h5>
                @else
                    <h5>donasi belum terpenuhi</h5>
                @endif</li>

              </ul>
              <div class="btn-wrap">
                <a href="/donatur/{{$row->slug}}" id="links_{{$row->id}}">
                    <button type="submit" class="submitbtn " style="
                    cursor: pointer; /* Pointer saat di hover */" id="submitbtn_{{$row->id}}">
Donasi

                    </button>
                </a>
                {{-- <a href="#" class="btn-buy">Buy Now</a> --}}
              </div>
            </div>
            @empty
            <h3>CAMPAIGN KOSONG</h3>
          </div>
          @endforelse

        </div>

      </div>
    </section><!-- End Pricing Section -->



  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <h3>DONASI KITA</h3>
      {{-- <p>Et aut eum quis fuga eos sunt ipsa nihil. Labore corporis magni eligendi fuga maxime saepe commodi placeat.</p> --}}
      <div class="social-links">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
      <div class="copyright">
        &copy; Copyright <strong><span>ifs</span></strong>
      </div>
      {{-- <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/selecao-bootstrap-template/ -->
        Designed by <a href="https://bootstrapmade.com/">ifs</a>
      </div> --}}
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <script>
    window.addEventListener('load', function(){
        @foreach($even->sortBy('id') as $item)
        var countdown{{$item->id}} = document.querySelector('#countdown_{{$item->id}}');
        var deadline{{$item->id}} = new Date(document.querySelector('#deadline_{{$item->id}}').textContent).getTime();
        var x{{$item->id}} = setInterval(function() {
            var now{{$item->id}} = new Date().getTime();
            var distance{{$item->id}} = deadline{{$item->id}} - now{{$item->id}};
            var days{{$item->id}} = Math.floor(distance{{$item->id}} / (1000 * 60 * 60 * 24));
            var hours{{$item->id}} = Math.floor((distance{{$item->id}} % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes{{$item->id}} = Math.floor((distance{{$item->id}} % (1000 * 60 * 60)) / (1000 * 60));
            var seconds{{$item->id}} = Math.floor((distance{{$item->id}} % (1000 * 60)) / 1000);
            countdown{{$item->id}}.innerHTML = days{{$item->id}} + "hari " + hours{{$item->id}} + "jam " + minutes{{$item->id}} + "menit " + seconds{{$item->id}} + "detik";
            if (distance{{$item->id}} < 0) {
                clearInterval(x{{$item->id}});
                countdown{{$item->id}}.innerHTML = "Waktu sudah habis!";
                document.querySelector('#submitbtn_{{$item->id}}').disabled = true;
                document.querySelector('#links_{{$item->id}}').disabled = true;

            }
        }, 1000);
        @endforeach
    });

    $(document).ready(function(){
$('.carousel').carousel();
});
</script>
  <!-- Vendor JS Files -->
  <script src="assets-3/vendor/aos/aos.js"></script>
  <script src="assets-3/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets-3/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets-3/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets-3/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets-3/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets-3/js/main.js"></script>

</body>

</html>
