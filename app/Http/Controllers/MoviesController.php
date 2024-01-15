<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http; // Add this line
use App\Models\User;
use App\ViewModels\ModelViewModel;


class MoviesController extends Controller
{
  
   

    public function movie()
    {
       

        
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
   

        $viewModel = new ModelViewModel(
            $popularMovies,
            $genre,
            $nowMovies,
        );
        

        return view('movies', $viewModel);
        
    }
    

    public function playmovies($id)
    {

        $movie = Http::withToken(config('services.tmdb.token'))
        
            ->get('https://api.themoviedb.org/3/movie/'.$id.'?api_key=API_KEY&append_to_response=videos')
            ->json();

        return view('moviesDetail', [
            'movie' =>$movie,
        ]);
       
    }
    
}
