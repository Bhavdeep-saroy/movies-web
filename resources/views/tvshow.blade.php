@extends('layout.main') <!-- Assuming 'main' is the name of your layout file -->
@section('content')

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5">
        <div class="container py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">TV Show</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-white" href="{{ route('index') }}">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="{{ route('movie') }}">Movies</a></li>
                    <li class="breadcrumb-item " aria-current="page"><a href="{{ route('actor') }}">Actor</a></li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="section-title text-center">
                <h1 class="display-5 mb-5">TV Show</h1>
            </div>
            <div class="row g-4">
                @foreach($TvShow as $show)

                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item">
                        <div class="overflow-hidden">
                        <a href="{{ route('playTvShow',['id' => $show['id']]) }}"> <img class="img-fluid" src="{{ $show['poster_path'] }}" alt=""></a>
                        <div class="portfolio-overlay">
                                <a class="btn btn-square btn-outline-light mx-1" href="{{ $show['poster_path'] }}" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                                <a class="btn btn-square btn-outline-light mx-1" href="{{ route('playTvShow',['id' => $show['id']]) }}"><i class="fa fa-link"></i></a>
                            </div>
                        </div>
                        <div class="p-4 text-center border border-5 border-light border-top-0">
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
    <!-- Service End -->



<!-- Testimonial Start -->


<div class="container-xxl py-5">
        <div class="container">
            <div class="section-title text-center">
                <h1 class="display-5 mb-5"> Popular TV Show</h1>
            </div>
                <div class="row g-4 portfolio-container">
    
                <!------- starte foreach ---------->
    
                @foreach($TvShow_rated as $show)
    
                <div class="col-lg-4 col-md-6 portfolio-item first wow fadeInUp" data-wow-delay="0.1s">
                        <div class="rounded overflow-hidden">
                            <div class="position-relative overflow-hidden">
                               <a href="{{ route('playTvShow',['id' => $show['id']]) }}"><img class="img-fluid w-70 h-30" src="{{ $show['poster_path'] }}" alt=""></a>
                               <div class="portfolio-overlay">
                                <a class="btn btn-square btn-outline-light mx-1" href="{{ $show['poster_path'] }}" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                                <a class="btn btn-square btn-outline-light mx-1" href="{{ route('playTvShow',['id' => $show['id']]) }}"><i class="fa fa-link"></i></a>
                            </div> 
                               
                            </div>
                            <div class="border border-5 border-light border-top-0 p-4">
                            <p>{{ $show['first_air_date'] }}</p>
                        <h4 class="mb-3">{{ $show['name'] }}</h4>
                                
                            </div>
                        </div>
    
                    </div>
                  
                  @endforeach
    
                  </div>
            </div>
        </div>



    <!-- Testimonial End -->
  @endsection

  