<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Si Warunk Homepage</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Krub:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('vendor/baru/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('vendor/baru/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('vendor/baru/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('vendor/baru/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('vendor/baru/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('vendor/baru/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('css/baru/style.css')}}" rel="stylesheet">


</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="/">Si Warunk</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto" href="{{url('/register')}}">Register</a></li>
          <li><a class="getstarted scrollto" href="{{url('/login')}}">Login</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container d-flex flex-column align-items-center justify-content-center" data-aos="fade-up">
      <h1>Pesan meja kamu disini!</h1>
      <h2>Kami menyediakan informasi mengenai meja yang bisa kamu pesan ditempat kami.</h2>
      <img src="{{asset('../img/restoran.jpg')}}" class="img-fluid hero-img" alt="" data-aos="zoom-out" data-aos-delay="150" width="1920" height="600">
    </div>

  </section><!-- End Hero -->

  
  <!-- Vendor JS Files -->
  <script src="{{asset('vendor/baru/aos/aos.js')}}"></script>
  <script src="{{asset('vendor/baru/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('vendor/baru/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('vendor/baru/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('vendor/baru/php-email-form/validate.js')}}"></script>
  <script src="{{asset('vendor/baru/swiper/swiper-bundle.min.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('js/baru/main.js')}}"></script>

</body>

</html>