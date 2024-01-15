@extends('layout.main') <!-- Assuming 'main' is the name of your layout file -->
@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5">
        <div class="container py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Actor Detail</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-white" href="{{ route('index') }}">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="{{ route('movie') }}">Movies</a></li>
                    <li class="breadcrumb-item " aria-current="page"><a href="{{ route('TvShow') }}"></a>TV Show</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Quote Start -->
    <div class="container-fluid bg-light overflow-hidden px-lg-0" style="margin: 6rem 0;">
        <div class="container quote px-lg-0">
            <div class="row g-0 mx-lg-0">
                <div class="col-lg-6 ps-lg-0" style="min-height: 400px;">
                    <div class="position-relative " style='margin-left: 98px;'>
                    <img height='390px'; width='390px';  src="{{ $ActorDiteal['profile_path'] }}" alt="">
                    <div class="border border-5 border-light border-top-0 p-4">
                            
                          @if($External_Ids['instagram_id'])
                             <a href="{{ $External_Ids['instagram_id'] }}"><i class="fab fa-instagram"></i></a>
                          @endif
                          @if($External_Ids['facebook_id'])
                             <a href="{{ $External_Ids['facebook_id'] }}"><i class="fab fa-facebook"></i></a>
                         @endif
                          @if($External_Ids['twitter_id'])
                             <a href="{{ $External_Ids['twitter_id'] }}"><i class="fab fa-twitter"></i></a>
                             @endif 
                           
                        
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 quote-text py-5 wow fadeIn" data-wow-delay="0.5s">
                    <div class="p-lg-3 pe-lg-0">
                        <div class="section-title text-start">
                            <h3 class="display-3 mb-2">{{ $ActorDiteal['name']}}</h3>
                        </div>
                        <p class="mb-4 pb-2">{{ $ActorDiteal['birthday']}}  <span> {{ $ActorDiteal['place_of_birth']}}</span></p>
                        <p class="mb-4 pb-2"> {{ Illuminate\Support\Str::limit($ActorDiteal['biography'], 540) }}</p></p>
                        <div class="border border-5 border-light border-top-0 p-4">
                            @foreach($Combined_movie as $movie)
                             <a href="{{ route('movies.play', ['movie' => $movie['id']]) }}"><img height="100px;" src="{{$movie['poster_path']}}"></a>
                            
                            @endforeach
   
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   

    <!-- Quote End -->
     @endsection