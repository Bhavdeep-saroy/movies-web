<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http; // Add this line
use App\ViewModels\TvShowModel;

class TvController extends Controller
{
    public function TvShow(){
        
           
    
            
                $TvShow = Http::withToken(config('services.tmdb.token'))
                ->get('https://api.themoviedb.org/3/tv/popular')
                ->json()['results'];

                $TvShow_rated = Http::withToken(config('services.tmdb.token'))
                ->get('https://api.themoviedb.org/3/tv/top_rated')
                ->json()['results'];
         

            $viewModel = new TvShowModel(
                $TvShow,
                $TvShow_rated,
            );
            
    
            return view('tvshow', $viewModel);
            
    
    }
    public function playTvShow($id)
    {

        $playTvShow = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/tv/'.$id)
        ->json();
       

return view('tvshowDetail', [
    'playTvShow' => $playTvShow,
]);
     
       
    }
}
