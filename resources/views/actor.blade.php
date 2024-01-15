@extends('layout.main') <!-- Assuming 'main' is the name of your layout file -->
@section('content')

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5">
        <div class="container py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Actors</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-white" href="{{ route('index') }}">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="{{ route('movie') }}">Movies</a></li>
                    <li class="breadcrumb-item "><a href="{{ route('TvShow') }}">Tv Show</a> </li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Projects Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="section-title text-center">
                <h1 class="display-5 mb-5">Our Actor</h1>
            </div>
            <div class="row mt-n2 wow fadeInUp" data-wow-delay="0.3s">
                <div class="col-12 text-center">
                    <ul class="list-inline mb-5" id="portfolio-flters">
                        <li class="mx-2 active" data-filter="*">All</li>
                        <li class="mx-2" data-filter=".first">General Carpentry</li>
                        <li class="mx-2" data-filter=".second">Custom Carpentry</li>
                    </ul>
                </div>
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