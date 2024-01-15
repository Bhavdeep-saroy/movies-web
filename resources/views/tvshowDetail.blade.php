@extends('layout.main') <!-- Assuming 'main' is the name of your layout file -->
@section('content')

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5">
        <div class="container py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">TV Show Detail</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-white" href="{{ route('index') }}">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="{{ route('movie') }}">Movies</a></li>
                    <li class="breadcrumb-item " aria-current="page"><a href="{{ route('actor') }}">Actors</a></li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


   


    <!-- About Start -->
    <div class="container-fluid bg-light overflow-hidden my-5 px-lg-0">
        <div class="container about px-lg-0">
            <div class="row g-0 mx-lg-0">
                <div class="col-lg-6 ps-lg-0" style="min-height: 400px;">
                    <div class="position-relative h-100">
                    <img src="https://image.tmdb.org/t/p/w500/{{ $playTvShow['poster_path'] }}" alt="">


                    </div>
                </div>
                <div class="col-lg-6 about-text py-5 wow fadeIn" data-wow-delay="0.5s">
                    <div class="p-lg-5 pe-lg-0">
                        <div class="section-title text-start">
                            <h1 class="display-5 mb-4">{{ $playTvShow['name'] }}</h1>
                        </div>
                        <p class="mb-4 pb-2">{{ $playTvShow['overview'] }} </p>
                        <div class="row g-4 mb-4 pb-2">
                            <div class="col-sm-6 wow fadeIn" data-wow-delay="0.1s">
                                <div class="d-flex align-items-center">
                                    <div class="ms-3">
                                        <p class="fw-medium mb-0">{{$playTvShow['vote_average'] * 10 . '%'}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 wow fadeIn" data-wow-delay="0.3s">
                                <div class="d-flex align-items-center">
                                    <div class="ms-3">
                                        <p class="fw-medium mb-0">{{ $playTvShow['first_air_date'] }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if(isset($playTvShow['homepage']))
                        <a href="{{ $playTvShow['homepage'] }}" class="btn btn-primary py-3 px-5">More Delail</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

     <!-- Feature Start -->
     <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
          @foreach($playTvShow['seasons'] as $Show)
                <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.1s">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <div class="d-flex align-items-center justify-content-center bg-light" style="width: 60px; height: 60px;">
                           <img src="https://image.tmdb.org/t/p/w500/{{ $Show['poster_path'] }}" style="width: 110px; height: 80px;" alt="">
                        </div>
                       
                    </div>
                    <h5>{{ $Show['air_date'] }}</h5>
                    <p>{{ $Show['name'] }}</p>
                </div>
              
              @endforeach
            </div>
        </div>
    </div>
    <!-- Feature Start -->



   
        
@endsection