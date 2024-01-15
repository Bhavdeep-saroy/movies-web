<?php

namespace App\ViewModels;

use Spatie\ViewModels\ViewModel;
use Carbon\Carbon;


class ModelViewModel extends ViewModel
{
    public $popularMovies;
    public $genre;
    public $nowMovies;


    public function __construct( $popularMovies, $genre,$nowMovies)
    {
           $this->popularMovies = $popularMovies;
           $this->genre =  $genre;
           $this->nowMovies =  $nowMovies;
    }
    
    public function popularMovies(){
       
        return $this->formatMovies($this->popularMovies);
    }
    
    

    public function genre(){
        return $this->genre;
    }

    public function nowMovies(){

           return $this->formatMovies($this->nowMovies);
    }
    private function formatMovies($movie){
        return collect($movie)->map(function($movie) {
            return collect($movie)->merge([
                'poster_path' => 'https://image.tmdb.org/t/p/w500/'.$movie['poster_path'],
                'release_date' => Carbon::parse($movie['release_date'])->format('M d, Y'),
                'vote_average' => $movie['vote_average'] * 10 . '%' 
            ]);
        });
    } 
}
