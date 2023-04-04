<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        .submitbtn:disabled {
            opacity: 0.5;
            /* Ubah opasitas menjadi 50% */
            cursor: not-allowed;
            /* Ganti pointer menjadi not-allowed */
        }

        .container {
            margin-bottom: 5%;
        }

        #form-header {
            margin-top: 5%;
            text-align: center;
        }

        #form-tagline {
            background: #3e4a47;
            border-top-left-radius: 0.5rem;
            border-bottom-left-radius: 0.5rem;
            color: #ffffff;
            margin-top: 5%;
            padding: 4%;
            text-align: left;
        }

        #form-tagline .fa {
            margin-bottom: 15%;
        }

        #form-tagline h2 {
            margin-bottom: 15%;
        }

        #form-content {
            background: #eae5e5;
            border-top-right-radius: 0.5rem;
            border-bottom-right-radius: 0.5rem;
            margin-top: 5%;
            padding: 3%;
        }

        .form-group {
            margin-top: 5%;
        }

        .contact {
            padding: 4%;
            height: 400px;
        }

        .control-label {
            font-size: 16px;
            font-weight: 600;
        }

        div .submit-button {
            margin-top: 3%;
            text-align: right;
        }

        button#submit {
            white-space: normal;
            width: auto;
            background: #15c771;
            color: #ffffff;
            font-weight: 600;
            width: 25%;
        }

        .progress {
    height: 20px;
    border-radius: 10px;
    background-color: #f2f2f2;
    margin-bottom: 20px;
    overflow: hidden;
}

.progress-bar {
    height: 20px;
    border-radius: 10px;
    background-color: #4caf50;
    width: 0%;
    transition: width 0.5s ease-in-out;
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



    </style>
    <title>{{ $dona->title }}</title>
</head>

<body>
    @include('sweetalert::alert')

    @if (session('error'))
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: true,

        })
        Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Donasi Gagal, harap perhatikan kembail data anda',

  footer: '<a href="#">untuk menghubungi lebih lanjut konfirmasi donasi tersebut</a>'
})
    </script>
@endif

    @if(session('success'))
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: true,

        })
        Swal.fire({
  icon: 'success',
  title: 'berhasil',
  text: 'Donasi Berhasil',
  html:
    'untuk konfirmasi donasi silahkan klik link ' +
    '<b><a href="https://sweetalert2.github.io/#examples">konfirmasi</a></b>',
//   footer: '<a href="#">untuk menghubungi lebih lanjut konfirmasi donasi tersebut</a>'
})
    </script>
    @endif


@if(Session::has('sweet_alert.alert'))
    <script>
        Toast.fire({
            icon: 'success',
            title: 'Session::get('sweet_alert.alert')'
        })
    </script>
@elseif(Session::has('sweet_alert.alert'))
    <script>
        Toast.fire({
            icon: 'error',
            title: 'Session::get('sweet_alert.alert')'

})

    </script>
    @endif
    <div class="container">
        <nav class="navbar navbar-dark bg-dark">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>


                </ul>

        </nav>

        <div class="container">
            <!-- open container -->
            <div class="row">
                <!--  open row -->

                <div id="form-header" class="col-12">
                    <h1 id="title">Donasi {{ $dona->title }}</h1>
                </div>
            </div> <!--  close row -->

            <div class="row align-self-center">
                <!--  open row -->
                @if($today->lessThanOrEqualTo($dona->deadline))
                <div id="form-tagline" class="col-md-4">
                    <div class="form-tagline">
                        <div class="card-item">
                            <i class="fa fa-envelope fa-5x"></i>
                            <div class="text-center">
                                <img class="card-img-top" src="{{ asset('artikel/' . $dona->thumbnail) }}"
                                    alt="Card image cap">



                                <h4>{{ $dona->title }}</h4>
                                <h6>target donasi {{ number_format($dona->goals, 0, '.', ',') }} dari
                                    {{ number_format($dona->raised, 0, '.', ',') }}</h6>
                                <p>Deadline: <span id="deadline_{{ $dona->id }}">{{ $dona->deadline }}</span></p>
                                <h2><span class="badge badge-info">
                                        <div class="countdown" id="countdown_{{ $dona->id }}"></div>
                                    </span></h2>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="{{ $dona->raised }}" aria-valuemin="0" aria-valuemax="{{ $dona->goals }}" style="width: {{($dona->raised / $dona->goals)* 100}}%;">
                                            {{-- <span>{{($dona->raised / $dona->goals)* 100}}%</span> --}}
                                        </div>
                                    </div>
                                    @if($dona->raised >= $dona->goals)

                                    <h4>Donasi terpenuhi</h4>
                                @else
                                    <h3>Donasi belum terpenuhi</h3>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>




                <div id="form-content" class="col-md-8">

                    <form action="{{ route('donatur.store') }}" method="POST" enctype="multipart/form-data">

                        @csrf
                        @method('POST')
                            <h3 class="text-center">FORM DONASI</h3>
                        <div class="row form-group">
                            <div class="col-sm-3">
                                <label id="name-label" class="control-label" for="name">Nama:</label>
                            </div>

                            <div class="input-group col-sm-9">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon-name"></span>
                                </div>
                                <input type="text" name="nama" class="form-control" placeholder="">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-sm-3">
                                <label id="name-label" class="control-label" for="name">Alamat</label>
                            </div>


                            <div class="input-group col-sm-9">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon-name"></span>
                                </div>
                                <input type="text" name="address" class="form-control" placeholder="">

                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-sm-3">
                                <label id="name-label" class="control-label" for="name">No Hp</label>
                            </div>


                            <div class="input-group col-sm-9">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon-name"></span>
                                </div>
                                <input type="number" name="phone" class="form-control" placeholder="">

                            </div>
                        </div>


                        <div class="row form-group">
                            <div class="col-sm-3">
                                <label id="name-label" class="control-label" for="name">Pembayaran</label>
                            </div>


                            <div class="input-group col-sm-9">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon-name"></span>
                                </div>
                                <input type="text" name="pembayaran" class="form-control"
                                    placeholder="">


                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-sm-3">
                                <label id="name-label" class="control-label" for="name">Jumlah</label>
                            </div>


                            <div class="input-group col-sm-9">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon-name"></span>
                                </div>
                                <input type="number" name="jumlah" class="form-control" placeholder="">



                            </div>
                        </div>


                        <div class="row form-group">
                            <div class="col-sm-3">
                                <label id="name-label" class="control-label" for="name">Bukti transfer</label>
                            </div>


                            <div class="col-sm-9">


                                <input type="file" name="gambar">


                            </div>
                        </div>







                        <input type="hidden" name="campaign_id" value="{{ $dona->id }}">

                        {{-- <div class="form-group">
                        <label>campaign</label>

                        <select name="campaign_id" id="" class="form-control">
                            @foreach ($campaign_all as $item)
                            <option value="{{$item->id}}">{{$item->title}}</option>
                            @endforeach

                        </select>



                    </div> --}}

                        <div class="form-group row">
                            <div class="col-sm-12 submit-button">
                                <button type="submit" id="submit" class="btn btn-default"
                                    aria-pressed="true">Submit Form</button>
                            </div>
                        </div>

                    </form>



                </div>
                <div class="mt-5">
                    <h4 >Donatur <span class="sub-span">{{ $dona->title }}</h4>

                    <div id="donatur">

                        @foreach ($donasi as $donation)
                            <div>

                                <h5 style="color: #ff6015;">

                                    {{ $donation->nama }}</h5>

                                <p>Berdonasi sebesar <b>Rp {{ number_format($donation->jumlah, 0, '.', ',') }}</b></p>
                                <p> {{$dona->title}}</p>
                                <p style="margin-top: -10px; font-size: 12px">
                                    {{ $donation->created_at->diffForHumans() }}</p>
                                <hr>
                            </div>
                        @endforeach
                    </div>
                </div>
                @else

<div class="container text-center">
    <div class="carousel-caption d-none d-md-block">

        <h5>maaf untuk donasi {{$dona->title}} telah berakhir</h5>
        {{-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p> --}}
      </div>
                <span class="badge badge-warning "><h2>Maaf campaign anda telah berakhir untuk {{$dona->title}}</h2></span>
            </div>
                @endif

                <footer class="text-center text-lg-start bg-light text-muted">
                    <!-- Section: Social media -->
                    <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
                        <!-- Left -->
                        <div class="me-5 d-none d-lg-block">
                            <span>{{ $dona->title }}</span>
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
            <script>
                window.addEventListener('load', function() {

                    var countdown{{ $dona->id }} = document.querySelector('#countdown_{{ $dona->id }}');
                    var deadline{{ $dona->id }} = new Date(document.querySelector('#deadline_{{ $dona->id }}')
                        .textContent).getTime();
                    var x{{ $dona->id }} = setInterval(function() {
                        var now{{ $dona->id }} = new Date().getTime();
                        var distance{{ $dona->id }} = deadline{{ $dona->id }} -
                            now{{ $dona->id }};
                        var days{{ $dona->id }} = Math.floor(distance{{ $dona->id }} / (1000 * 60 *
                            60 * 24));
                        var hours{{ $dona->id }} = Math.floor((distance{{ $dona->id }} % (1000 * 60 *
                            60 * 24)) / (1000 * 60 * 60));
                        var minutes{{ $dona->id }} = Math.floor((distance{{ $dona->id }} % (1000 *
                            60 * 60)) / (1000 * 60));
                        var seconds{{ $dona->id }} = Math.floor((distance{{ $dona->id }} % (1000 *
                            60)) / 1000);
                        countdown{{ $dona->id }}.innerHTML = days{{ $dona->id }} + " hari " +
                            hours{{ $dona->id }} + " jam " + minutes{{ $dona->id }} + " menit ";
                        if (distance{{ $dona->id }} < 0) {
                            clearInterval(x{{ $dona->id }});
                            countdown{{ $dona->id }}.innerHTML = "Waktu sudah habis!";
                            document.querySelector('#submitbtn_{{ $dona->id }}').disabled = true;
                            document.querySelector('#links_{{ $dona->id }}').disabled = true;

                        }
                    }, 1000);

                });
            </script>

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



<script>
    $(document).ready(function() {
    $('.progress-bar').each(function() {
        var percentage = $(this).attr('aria-valuenow');
        $(this).animate({width: percentage + '%'}, 500);
    });
});
</script>



            <!-- Optional JavaScript -->
            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
                integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
                < script src = "https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
                integrity = "sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
                crossorigin = "anonymous" >
            </script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
                integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
            </script>




</body>

</html>
