@extends('layout.main') <!-- Assuming 'main' is the name of your layout file -->
@section('content')
    <!-- Carousel Start -->
    <div class="container-fluid p-0 pb-5">
        <div class="owl-carousel header-carousel position-relative">
            <div class="owl-carousel-item position-relative">
                <img style="height: 413px;" src="img/images.jpg" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(53, 53, 53, .7);">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-12 col-lg-8 text-center">
                                <h5 class="text-white text-uppercase mb-3 animated slideInDown">Welcome To Movies Web</h5>
                                <h1 class="display-3 text-white animated slideInDown mb-4">Latest Movies</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-carousel-item position-relative">
                <img style="height: 413px;" src="img/download.jpg" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(53, 53, 53, .7);">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-12 col-lg-8 text-center">
                                <h5 class="text-white text-uppercase mb-3 animated slideInDown">Welcome To  Movies Web</h5>
                                <h1 class="display-3 text-white animated slideInDown mb-4">Latest TV Show Services</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-carousel-item position-relative">
                <img style="height: 413px;" src="img/parites.jpg" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(53, 53, 53, .7);">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-12 col-lg-8 text-center">
                                <h5 class="text-white text-uppercase mb-3 animated slideInDown">Welcome To  Movies Web</h5>
                                <h1 class="display-3 text-white animated slideInDown mb-4">Popular Actor</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->





   <!-- Projects Start -->
   <div class="container-xxl py-5">
        <div class="container">
            <div class="section-title text-center">
                <h1 class="display-5 mb-5">Playing Movie</h1>
            </div> 
                <div class="row g-4 portfolio-container">
    
                <!------- starte foreach ---------->
    
                @foreach($nowMovies as $movie)
    
                <div class="col-lg-4 col-md-6 portfolio-item first wow fadeInUp" data-wow-delay="0.1s">
                        <div class="rounded overflow-hidden">
                            <div class="position-relative overflow-hidden">
                               <a href="{{ route('movies.play', ['movie' => $movie['id']]) }}"><img class="img-fluid w-70 h-30" src="{{$movie['poster_path'] }}" alt=""></a> 
                               
                            </div>
                            <div class="border border-5 border-light border-top-0 p-4">
                                <p class="text-primary fw-medium mb-2"> Release  date    {{$movie['release_date'] }}</p>
                                <p class="text-primary fw-medium mb-2">  {{$movie['vote_average']  }}
                              
                                 <a href="#"><img src="img/star-icon.png"></a>
                                 <a href="#"><img src="img/star-icon.png"></a>
                                 <a href="#"><img src="img/star-icon.png"></a>
                                 <a href="#"><img src="img/star-icon.png"></a>
                                 <a href="#"><img src="img/star-icon.png"></a>
                               
                                </p>
                                <h5 class="lh-base mb-0">{{$movie['title'] }} </a>
                            </div>
                        </div>
    
                    </div>
                  
                  @endforeach
    
                  </div>
            </div>
        </div>



    <!-- Projects Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="section-title text-center">
                <h1 class="display-5 mb-5">TV Show</h1>
            </div>
            <div class="row g-4 portfolio-container">
            @foreach($TvShow as $show)
                <div class="col-lg-4 col-md-6 portfolio-item first wow fadeInUp" data-wow-delay="0.1s">
                    <div class="rounded overflow-hidden">
                        <div class="position-relative overflow-hidden">
                            <a href="{{ route('playTvShow',['id' => $show['id']]) }}"><img class="img-fluid w-100" src="{{ $show['poster_path'] }}" alt=""></a>
                            <div class="portfolio-overlay">
                                <a class="btn btn-square btn-outline-light mx-1" href="{{ $show['poster_path'] }}" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                                <a class="btn btn-square btn-outline-light mx-1" href="{{ route('playTvShow',['id' => $show['id']]) }}"><i class="fa fa-link"></i></a>
                            </div>
                        </div>
                        <div class="border border-5 border-light border-top-0 p-4">
                        <h4 class="mb-3">{{ $show['name'] }}</h4>
                            <p>{{ $show['first_air_date'] }}</p>
                            <p>{{ $show['vote_average'] }} 
                            <a href="#"><img src="img/star-icon.png"></a>
                             <a href="#"><img src="img/star-icon.png"></a>
                             <a href="#"><img src="img/star-icon.png"></a>
                             <a href="#"><img src="img/star-icon.png"></a>
                             <a href="#"><img src="img/star-icon.png"></a>
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Projects End -->

        <!-- Projects Start -->
        <div class="container-xxl py-5">
        <div class="container">
            <div class="section-title text-center">
                <h1 class="display-5 mb-5">Our Actor</h1>
            </div>
        
            <div class="row g-4 portfolio-container">

            <!-- ----- starte foreach ---------->

          @foreach($popularActor as $actor)

            
          <div class="col-lg-4 col-md-6 portfolio-item first wow fadeInUp" data-wow-delay="0.1s">
                    <div class="rounded overflow-hidden">
                        <div class="position-relative overflow-hidden">
                          <a href="{{ route('ActorId',['id' => $actor['id']]) }}"> <img class="img-fluid w-70 h-30" src="{{$actor['profile_path'] }}" alt=""></a>
                        </div>
                        <div class="border border-5 border-light border-top-0 p-4">
                            <p class="text-primary fw-medium mb-2"> Release  date    </p>
                            <p class="text-primary fw-medium mb-2"> 
                          
                             <a href="#"><img src="img/star-icon.png"></a>
                             <a href="#"><img src="img/star-icon.png"></a>
                             <a href="#"><img src="img/star-icon.png"></a>
                             <a href="#"><img src="img/star-icon.png"></a>
                             <a href="#"><img src="img/star-icon.png"></a>
                           
                            </p>
                            <h5 class="lh-base mb-0">{{$actor['name'] }} </a>
                        </div>
                    </div>

                </div>
              

              
              @endforeach 

              </div>
        </div>
    </div>





@endsection