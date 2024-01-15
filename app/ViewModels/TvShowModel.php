<?php

namespace App\ViewModels;

use Spatie\ViewModels\ViewModel;
use Carbon\Carbon;

class TvShowModel extends ViewModel
{
    public $TvShow;
    public  $TvShow_rated;

    public function __construct($TvShow,  $TvShow_rated)
    {
        $this->TvShow = $TvShow;
        $this->TvShow_rated = $TvShow_rated;
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


}
