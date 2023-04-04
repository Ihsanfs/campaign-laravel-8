<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

        <!-- Vendor CSS Files -->
        <link href="(assets-2/vendor/aos/aos.css" rel="stylesheet)">
        <link href="assets-2/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets-2/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <link href="assets-2/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
        <link href="assets-2/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
        <link href="assets-2/vendor/remixicon/remixicon.css" rel="stylesheet">
        <link href="assets-2/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

        <!-- Template Main CSS File -->
        <link href="assets-2/css/style.css" rel="stylesheet">

        <style>
            .submitbtn:disabled {
  opacity: 0.5; /* Ubah opasitas menjadi 50% */
  cursor: not-allowed; /* Ganti pointer menjadi not-allowed */
}

.progress{
	width: 100%;
	height: 10px;
}
.skill-wrapper{
  margin-bottom:30px;
}
.skill-wrapper span {
    font-size: 14px;
    line-height: 20px;
    text-transform: uppercase;
    font-family: Inconsolata,monospace;
    margin-bottom: 10px;
}
.progress-bar {
    background: #0c0039;
}
.progressbar-active{
	animation-name: progress;
	animation-duration: 1s;
	animation-fill-mode: forwards;
	animation-delay: 0.4s;
}
@keyframes progress{
	0%{
		width:0;
	}
	100%{
		width:100%;
	}
}

        </style>

    <title>campaign</title>
</head>

<body>
    {{-- <div class="container"> --}}
    <nav class="navbar navbar-expand-lg bg-body-tertiary bg-info">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src=""  width="30" height="24" class="d-inline-block align-text-top">
                KITA DONASI
              </a>

          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">DONASI</a>
              </li>

            </ul>
            <b><span class="navbar-text">
              SELAMAT DATANG DI CAMPAIGN KAMI
            </span>
        </b>
          </div>
        </div>
      </nav>



        {{-- <div id="myCarousel" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            @foreach($even as $key => $image)
              <li data-target="#myCarousel" data-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}"></li>
            @endforeach
          </ol>

          <div class="carousel-inner">
            @foreach($even as $key => $image)
              <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                <img src="{{ asset('artikel/'.$image->thumbnail) }}" class="d-block w-100" alt="...">
              </div>
            @endforeach
          </div>

          <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div> --}}
      <div class="jumbotron jumbotron-fluid">
        <div class="container">

<div class="text-right">
            <img src="data:image/jpeg;base64,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" alt="">
        </div>

          <h1 class="display-4">Fluid jumbotron</h1>
          <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
        </div>
      </div>


          <section id="services" class="services section-bg">
            <div class="container" data-aos="fade-up">

              <div class="section-title">


    {{-- COUNTDOWN --}}
    {{-- <div class="container">
        <h2>Countdown Deadline and Disable Button</h2>
        <div id="items">
            @foreach($even->sortBy('id') as $item)
            <div class="item">
                <h4>{{$item->name}}</h4>
                <p>Deadline: <span id="deadline_{{$item->id}}">{{$item->deadline}}</span></p>
                <div class="countdown" id="countdown_{{$item->id}}"></div>
                <button type="submit" class="submitBtn" id="submitBtn_{{$item->id}}">Submit</button>
            </div>
            @endforeach
        </div>
    </div>

</div> --}}

{{-- <p id="timer"></p> --}}

                <h2>Donasi</h2>
                {{-- <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p> --}}
              </div>



              <div class="row">
                @foreach ($even as $row)
                <div class="col-xl-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                  <div class="icon-box">
                    {{-- <div class="icon"><i class="bx bxl-dribbble"></i></div> --}}
                  {{-- <a href="" style="color:black"> --}}
                    <img class="card-img-top" src="{{ asset('artikel/'.$row->thumbnail) }}" alt="Card image cap">

                    <h4>{{$row->title}}</h4>
                    <h6>target donasi {{number_format($row->goals, 0, '.',',')}} dari  {{number_format($row->raised, 0, '.',',')}}</h6>
                    {{-- <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="{{ $row->raised }}" aria-valuemin="0" aria-valuemax="{{ $row->goals }}" style="width: {{($row->raised / $row->goals)* 100}}%;">
                            <b><span  style="color:black">{{($row->raised / $row->goals)* 100}}%</span></b>
                        </div>
                    </div> --}}

                    <div class="skill-wrapper">
                        <span class="d-block float-left"></span><span class="d-block float-right">{{round($row->raised / $row->goals)* 100}}%</span>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="{{ $row->raised }}" aria-valuemin="0" aria-valuemax="{{ $row->goals }}" style="width: {{($row->raised / $row->goals)* 100}}%;">
                        </div>
                    </div>
                    <div class="progress">
                        <span class="skill">HTML <i class="val">100%</i></span>
                        <div class="progress-bar-wrap">
                          <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>

                    {{-- <p>{{$row->deadline}}</p> --}}
                    {{-- <h4>{{$row->title}}</h4> --}}
                    <p>Deadline: <span id="deadline_{{$row->id}}">{{$row->deadline}}</span></p>


                  <span class="badge badge-info">
                        <div class="countdown" id="countdown_{{$row->id}}"></div>
                        </span>
                        <hr>
                    <div class="countdown" id="countdown_{{$row->id}}"></div>
                    <p style="margin-top: -10px; font-size: 12px">{{ $row->created_at->diffForHumans() }}</p>

                    <a href="/donatur/{{$row->slug}}" id="links_{{$row->id}}">
                    <button type="submit" class="submitbtn " style="background-color: #4CAF50; /* Warna background */
                    border: none; /* Hilangkan border */
                    color: white; /* Warna teks */
                    padding: 10px 30px; /* Ukuran padding */
                    text-align: center; /* Rata tengah teks */
                    text-decoration: none; /* Hilangkan underline */
                    display: inline-block; /* Menampilkan sebagai block */
                    font-size: 16px; /* Ukuran font */
                    margin: 4px 2px; /* Margin */
                    cursor: pointer; /* Pointer saat di hover */" id="submitbtn_{{$row->id}}">
Donasi

                    </button>

                    {{-- </a> --}}
                    @if($row->raised >= $row->goals)

                    <h4>donasi terpenuhi</h4>
                @else
                    <h3>donasi belum terpenuhi</h3>
                @endif
                </a>
                  </div>
                </div>

                @endforeach
              </div>

            </div>
          </section><!-- End Services Section -->




    </div>

    <footer class="text-center text-lg-start bg-light text-muted">
        <!-- Section: Social media -->
        <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
            <!-- Left -->
            <div class="me-5 d-none d-lg-block">
                <span>Get connected with us on social networks:</span>
            </div>
            <!-- Left -->

            <!-- Right -->
            <div>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-google"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-linkedin"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-github"></i>
                </a>
            </div>
            <!-- Right -->
        </section>
        <!-- Section: Social media -->

        <!-- Section: Links  -->
        <section class="">
            <div class="container text-center text-md-start mt-5">
                <!-- Grid row -->
                <div class="row mt-3">
                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <!-- Content -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            <i class="fas fa-gem me-3"></i>Company name
                        </h6>
                        <p>
                            Here you can use rows and columns to organize your footer content. Lorem ipsum
                            dolor sit amet, consectetur adipisicing elit.
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            Products
                        </h6>
                        <p>
                            <a href="#!" class="text-reset">Angular</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">React</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Vue</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Laravel</a>
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            Useful links
                        </h6>
                        <p>
                            <a href="#!" class="text-reset">Pricing</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Settings</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Orders</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Help</a>
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
                        <p><i class="fas fa-home me-3"></i> New York, NY 10012, US</p>
                        <p>
                            <i class="fas fa-envelope me-3"></i>
                            info@example.com
                        </p>
                        <p><i class="fas fa-phone me-3"></i> + 01 234 567 88</p>
                        <p><i class="fas fa-print me-3"></i> + 01 234 567 89</p>
                    </div>
                    <!-- Grid column -->
                </div>
                <!-- Grid row -->
            </div>
        </section>
        <!-- Section: Links  -->

        <!-- Copyright -->
        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
            © 2021 Copyright:
            <a class="text-reset fw-bold" href="https://mdbootstrap.com/">MDBootstrap.com</a>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->











    </div>
    <script type="text/javascript">
     $(window).on('scroll',function(){
			let scroll = $(window).scrollTop();
			let oTop = $('.progress-bar').offset().top - window.innerHeight;
			if(scroll>oTop){
				$(".progress-bar").addClass("progressbar-active");
			}
			else{
				$(".progress-bar").removeClass("progressbar-active");
			}
		});
    </script>
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{-- <script>
        $(document).ready(function() {
          var count = 30; // set durasi countdown dalam detik
          var interval = setInterval(function() {
            count--;
            $("#timer").text("Waktu tersisa: " + count + " detik");
            if (count == 0) {
              clearInterval(interval);
              $("#myButton").prop("disabled", true); // atur tombol menjadi disabled
            }
          }, 1000);
        });

        </script> --}}
        {{-- <script>
            $(document).ready(function() {
                // set waktu deadline
                var deadline = new Date("{{ $deadline }}");

                // update countdown setiap detik
                var x = setInterval(function() {
                    // ambil waktu saat ini
                    var now = new Date().getTime();

                    // hitung selisih waktu antara waktu deadline dan waktu saat ini
                    var distance = deadline - now;

                    // hitung waktu yang tersisa dalam format menit
                    var minutes = Math.floor(distance / (1000 * 60));
                    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                    // tampilkan waktu yang tersisa dalam countdown timer
                    $("#countdown1").html(seconds + " detik");
                    $("#countdown").html(minutes + " menit");

                    // jika waktu deadline sudah berakhir, atur status disabled pada tombol Submit
                    if (distance < 0) {
                        clearInterval(x);
                        $("#submit").prop("disabled", true);
                    }
                }, 1000);
            });
            </script>
        <script>
            $(document).ready(function() {
              var deadline = new Date("{{ $deadline }}").getTime(); // set waktu deadline dalam format UTC
              var interval = setInterval(function() {
                var now = new Date().getTime();
                var distance = deadline - now;
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                $("#timer").html("Waktu tersisa: " + days + " hari, " + hours + " jam, " + minutes + " menit, " + seconds + " detik");
                if (distance <= 0) {
                  clearInterval(interval);
                  $("#myButton").prop("disabled", true); // atur tombol menjadi disabled
                  $("#timer").html("Waktu telah habis.");
                }
              }, 1000);
            });
          </script> --}}







    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
      <script src="assets-2/vendor/aos/aos.js"></script>
      <script src="assets-2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <script src="assets-2/vendor/glightbox/js/glightbox.min.js"></script>
      <script src="assets-2/vendor/isotope-layout/isotope.pkgd.min.js"></script>
      <script src="assets-2/vendor/swiper/swiper-bundle.min.js"></script>
      <script src="assets-2/vendor/waypoints/noframework.waypoints.js"></script>
      <script src="assets-2/vendor/php-email-form/validate.js"></script>


      <script src="assets-2/js/main.js"></script>
</body>

</html>
