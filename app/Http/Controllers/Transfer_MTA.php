<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ViewModels\MTA_model;
use Illuminate\Support\Facades\Http; // Add this line

class Transfer_MTA extends Controller
{
    public function index(){
        
        $nowMovies = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/movie/now_playing')
        ->json()['results'];
      
        $popularMovies = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/movie/popular')
        ->json()['results'];


        $genreArray = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/genre/movie/list') // Fix the URL typo
        ->json()['genres']; // Access 'genres' key in the JSON response

         $genre = collect($genreArray)->mapWithKeys(function ($genre) {
                  return [$genre['id'] => $genre['name']];
               });



  
    $TvShow = Http::withToken(config('services.tmdb.token'))
    ->get('https://api.themoviedb.org/3/tv/popular')
    ->json()['results'];

    $TvShow_rated = Http::withToken(config('services.tmdb.token'))
    ->get('https://api.themoviedb.org/3/tv/top_rated')
    ->json()['results'];





    $popularActor = Http::withToken(config('services.tmdb.token'))
    ->get('https://api.themoviedb.org/3/person/popular')
    ->json()['results'];

    $viewmodel = new MTA_model( 
        $popularActor,
        $TvShow,
        $TvShow_rated,
        $popularMovies,
        $genre,
        $nowMovies,
     );
    
      return view('index',$viewmodel);
    

    }
}
