<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        .carousel-inner {
  max-height: 400px;
  img {
    max-height: 400px;
  }
}


.carousel-indicators img {
  max-width: 100px;

}
    </style>
    <title>berita</title>
</head>

<body>
    {{-- <div class="container"> --}}
        <nav class="navbar navbar-dark bg-dark fixed">
            <a class="navbar-brand" href="#">Portal</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>

                    @foreach ($kategori_all as $item)
                    <li class="nav-item active">
                        <a class="nav-link" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           {{$item->slug}}
                          </a>

                          <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="#">{{$item->nama_kategori}}</a>
                          </div>

                    </li>
                    @endforeach
                </ul>

        </nav>

        {{-- caraousel --}}

            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($slide as $key=> $item)
                    <div class="carousel-item active{{$key == 0 ? 'active' : ''}}">
                        <img class="d-block w-100"  src="{{ asset('artikel/'.$item->gambar_slide) }}" alt="First slide">
                    </div>
                    @endforeach

                </div>
                <ol class="carousel-indicators">

                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>



                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

            <div class="py-5">
                <div class="container">
                  <div class="row hidden-md-up">
                    @foreach ($artikel as $item)


                    <div class="col-md-3">
                      <div class="card " style="width: 15rem;">
                        <div class="card-block">
                          {{-- <h4 class="card-title">Card title</h4> --}}
                          <img class="card-img-top" src="{{asset('artikel/'.$item->gambar_artikel)}}" alt="Card image cap">

                          {{-- <h6 class="card-subtitle text-muted">Support card subtitle</h6> --}}
                          <p class="card-text p-y-1">
                          <a href="/detail-artikel/{{$item->slug}}" style="text-decoration: none">

                            {{$item->judul}}</a></p>
                            <h6>{{
                                Carbon\Carbon::parse($item->created_at)->translatedFormat('l, d F Y '.'g:i  a' ) }}
                                </h6>
                        </div>
                      </div>
                    </div>
                    @endforeach

                  </div>
                </div>
              </div>

            {{-- <div class="py-5">
        <div class="container d-flex flex-wrap align-items-center mt-2">

            @foreach ($artikel as $item)
            <div class="row mb-2">
                <div class="card-body">

                <div class="col-lg-4 col-md-6">
                    <div class="card" style="width: 15rem;">
                        <div class="card-block">
                        <img class="card-img-top" src="{{asset('artikel/'.$item->gambar_artikel)}}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="/detail-artikel/{{$item->slug}}" style="text-decoration: none">

                            {{$item->judul}}</a>

                            <p>{{
                            Carbon\Carbon::parse($item->created_at)->translatedFormat('l, d F Y '.'g:i  a' ) }}
                            </p>

                        </h5>
                    </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            @endforeach


            </div>
        </div> --}}

<div class="progress">

    <div class="progress-bar" role="progressbar" style="width : {{$persen}}%;" aria-valuenow="{{$persen}}" aria-valuemin="{{$persen}}" aria-valuemax="{{$persen}}">{{$persen}}</div>
</div>

            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mt-4">
                        <div class="detail-sidebar-iklan">
                            <h4 class="mt-4">artikel terbaru</h4>
                              <hr>

                              @foreach ($artikel as $item)
                              <div class="media mt-2">
                                <img class="mr-3" width="80px" style="max-width: 300px; min-width: 200px; max-height: 200px; min-height: 100px;" src="{{asset('artikel/' . $item->gambar_artikel)}}" >

                                <div class="media-body">
                                    <h5 class="card-title">
                                        <a href="/detail-artikel/{{$item->slug}}" style="text-decoration: none">

                                    {{$item->judul}}</a>
                                    {{-- <p>{!! Str::limit($item->body, 50) !!}</p> --}}

                                </div>
                              </div>
                              @endforeach

                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <h5>Bootstrap 4 Equal Height Cards using Grid and Flexbox Utilities</h5>
                @foreach ($artikel as $item)


                <div class="row equal">
                    <div class="col-sm-4 d-flex pb-3">
                        <div class="card card-block">
                            Card. I'm just a simple card-block.
                        </div>
                    </div>
                    <div class="col-sm-4 d-flex pb-3">
                        <div class="card card-inverse card-danger">
                            <div class="card-block">
                                <h3 class="card-title">Danger</h3>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                <a href="#" class="btn btn-outline-secondary">Outline</a>
                            </div>
                        </div>
                    </div>

                </div>
                @endforeach
            </div>

            <footer class="text-center text-lg-start bg-dark text-light mt-3">
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
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
        </script>
</body>

</html>
