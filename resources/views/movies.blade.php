@extends('layout.main') <!-- Assuming 'main' is the name of your layout file -->
@section('content')

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5">
        <div class="container py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Movies </h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-white" href="{{ route('index') }}">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="{{ route('TvShow') }}">Tv Show</a></li>
                    <li class="breadcrumb-item "><a href="{{ route('actor') }}">Actor</a></li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Projects Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="section-title text-center">
                <h1 class="display-5 mb-5">Popular Movies</h1>
            </div>
            <div class="row g-4 portfolio-container">

            <!-- ----- starte foreach ---------->

          @foreach($popularMovies as $movie)

            <x-movie-card :movie="$movie" />

              
              @endforeach 

              </div>
        </div>
    </div>
 

          
       



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
                               <div class="portfolio-overlay">
                                <a class="btn btn-square btn-outline-light mx-1" href="{{ $movie['poster_path'] }}" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                                <a class="btn btn-square btn-outline-light mx-1" href="{{ route('movies.play', ['movie' => $movie['id']]) }}"><i class="fa fa-link"></i></a>
                            </div> 
                               
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

      
@endsection