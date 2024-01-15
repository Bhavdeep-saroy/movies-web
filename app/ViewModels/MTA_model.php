<?php

namespace App\ViewModels;

use Spatie\ViewModels\ViewModel;
use Carbon\Carbon;

class MTA_model extends ViewModel
{
    public    $popularActor;
    public    $TvShow;
    public    $TvShow_rated;
    public    $popularMovies;
    public    $genre;
    public    $nowMovies;

    public function __construct( $popularActor, $TvShow, $TvShow_rated,$popularMovies, $genre, $nowMovies,)
    {
        $this->popularActor = $popularActor;
        $this->TvShow       =  $TvShow;
        $this->TvShow_rated =  $TvShow_rated;
        $this->popularMovies=  $popularMovies;
        $this->genre        =  $genre;
        $this->nowMovies    =  $nowMovies;
    }
    public function popularActor(){
        return collect($this->popularActor)->map(function($actor) {
            return collect($actor)->merge([
                'profile_path' => $actor['profile_path']
                ?'https://image.tmdb.org/t/p/w500/'.$actor['profile_path']
                :'http://ui-avatars.com/api/?size=500name='.$actor['name'],
                // 'release_date' => Carbon::parse($actor['release_date'])->format('M d, Y'),
                // 'vote_average' => $actor['vote_average'] * 10 . '%' 
            ])->only([
                'name','id','profile_path','known_for',
            ]);
        });
    }
    public function TvShow(){

        return collect($this->TvShow)->map(function($show) {
            return collect($show)->merge([
                'poster_path' => 'https://image.tmdb.org/t/p/w500/'.$show['poster_path'],
                 'first_air_date' => Carbon::parse($show['first_air_date'])->format('M d, Y'),
                'vote_average' => $show['vote_average'] * 10 . '%' 
            ]);
        });
    }

    public function TvShow_rated(){

        return collect($this->TvShow_rated)->map(function($show) {
            return collect($show)->merge([
                'poster_path' => 'https://image.tmdb.org/t/p/w500/'.$show['poster_path'],
                 'first_air_date' => Carbon::parse($show['first_air_date'])->format('M d, Y'),
                'vote_average' => $show['vote_average'] * 10 . '%' 
            ]);
        });
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
