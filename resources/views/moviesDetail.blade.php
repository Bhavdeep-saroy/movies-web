<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Woody - Carpenter Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">
   
    <!-- Google Web Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha384-GLhlTQ8iK9tGR5IgB3iaFExl3IW+GLLbe5vNNZUnA8w5rNYJLr+J2L4ba/nfNBl" crossorigin="anonymous">
</head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Roboto:wght@500;700;900&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->

    <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">

    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <livewire:styles />
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


   


    <!-- Navbar Start -->
 

    <nav class="navbar navbar-expand-lg bg-white navbar-light  p-0">
        <a href="index.html" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h2 class="m-0 text-primary">🎥</h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="{{ route('index') }}" @if(request()->routeIs('index')) class="nav-item nav-link active"   @else  class="nav-item nav-link" @endif>Home</a>

            <a href="{{ route('movie') }}"  @if(request()->routeIs('movie')) class="nav-item nav-link active"   @else  class="nav-item nav-link" @endif>Movies</a>
            <a href="{{ route('actor') }}"  @if(request()->routeIs('actor')) class="nav-item nav-link active"   @else  class="nav-item nav-link" @endif>Actors</a>
            <a href="{{ route('TvShow') }}"  @if(request()->routeIs('TvShow')) class="nav-item nav-link active"   @else  class="nav-item nav-link" @endif>Tv Show</a>

            </div>
           <livewire:search-dropdown>
        </div>
    </nav>
    <!-- Navbar End -->
<!---------------------------------------------- content start------------------------------------------------------->
<div class="container-fluid bg-light overflow-hidden my-5 px-lg-0">
    <div class="container about px-lg-0">
        <div class="row g-0 mx-lg-0">
            <div class="col-lg-6 ps-lg-0" style="min-height: 350px;">
                <div class="position-relative h-80">
                    <img class="img-fluid w-60 h-40" src="https://image.tmdb.org/t/p/w500/{{ $movie['poster_path'] }}" alt="">
                </div>
            </div>
            <div class="col-lg-6 about-text py-5 wow fadeIn" data-wow-delay="0.5s">
                <div class="p-lg-5 pe-lg-0">
                    <div class="section-title text-start">
                        <h1 class="display-5 mb-4">{{ $movie['title'] }}</h1>
                    </div>
                    <p class="mb-4 pb-2">{{ $movie['overview'] }}</p>
                    <div class="row g-4 mb-4 pb-2">
                        <div class="border border-5 border-light border-top-0 p-4">
                            <p class="text-primary fw-medium mb-2"> Release date {{ $movie['release_date'] }}</p>
                            <p class="text-primary fw-medium mb-2">{{ $movie['vote_average'] * 10 .'%' }}
                                <a href="#"><img src="{{ asset('img/star-icon.png') }}" alt="star"></a>
                                <a href="#"><img src="{{ asset('img/star-icon.png') }}" alt="star"></a>
                                <a href="#"><img src="{{ asset('img/star-icon.png') }}" alt="star"></a>
                                <a href="#"><img src="{{ asset('img/star-icon.png') }}" alt="star"></a>
                                <a href="#"><img src="{{ asset('img/star-icon.png') }}" alt="star"></a>
                            </p>
                        </div>
                        @if(isset($movie['videos']['results'][0]['key']))
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#videoModal">Play Now</button>
                        @else
                            <p>No video available</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<!-- Modal -->
<div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="videoModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <iframe width="470" height="400" src="https://www.youtube.com/embed/{{ $movie['videos']['results'][0]['key'] }}?autoplay=1" frameborder="0" allowfullscreen></iframe>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <!----------------------------------------------------------------------------------------->


      <!-- Projects Start -->
      <div class="container-xxl py-5">
        
       
            <div class="container">  
                <div class="row g-4 portfolio-container">
    
                <!------- starte foreach ---------->
    
                @foreach($movie['production_companies'] as $company)
    
                <div class="col-lg-4 col-md-6 portfolio-item first wow fadeInUp" data-wow-delay="0.1s">
                        <div class="rounded overflow-hidden">
                            <div class="position-relative overflow-hidden">
                             <img class="img-fluid w-50 h-30" src="https://image.tmdb.org/t/p/w500/.{{$company['logo_path'] }}" alt="">
                               
                            </div>
                            <div class="border border-5 border-light border-top-0 p-4">
                                
                                <p class="text-primary fw-medium mb-2">Country  {{$company['origin_country'] }}  </p>
                                
                                <h5 class="lh-base mb-0"> </a>
                            </div>
                        </div>
    
                    </div>
                  
                  @endforeach
    
                  </div>
            </div>
        </div>
      
<!---------------------------------------------------content end------------------------------------------------------------->
   <!-- Footer Start -->
   <div class="container-fluid bg-dark text-light footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Address</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>123 Street, New York, USA</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@example.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Services</h4>
                    <a class="btn btn-link" href="">General Carpentry</a>
                    <a class="btn btn-link" href="">Furniture Remodeling</a>
                    <a class="btn btn-link" href="">Wooden Floor</a>
                    <a class="btn btn-link" href="">Wooden Furniture</a>
                    <a class="btn btn-link" href="">Custom Carpentry</a>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="#">Your Site Name</a>, All Right Reserved.
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                        Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-0 back-to-top"><i class="bi bi-arrow-up"></i></a>

    <livewire:scripts />
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('lib/isotope/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('lib/lightbox/js/lightbox.min.js') }}"></script>




    <script src="https://example.com/fontawesome/v6.5.1/js/all.js" data-auto-replace-svg="nest"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://example.com/fontawesome/v6.5.1/js/fontawesome.js" data-auto-replace-svg="nest"></script>
  <script src="https://example.com/fontawesome/v6.5.1/js/solid.js"></script>
  <script src="https://example.com/fontawesome/v6.5.1/js/brands.js"></script>


    <!-- Template Javascript -->
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>





