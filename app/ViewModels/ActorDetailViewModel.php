<?php

namespace App\ViewModels;
use Carbon\Carbon;
use Spatie\ViewModels\ViewModel;

class ActorDetailViewModel extends ViewModel
{
    public $ActorDiteal;
    public $Combined_Credits;
    public $External_Ids;

    public function __construct($ActorDiteal, $Combined_Credits, $External_Ids)
    {
        $this->ActorDiteal = $ActorDiteal;
        $this->Combined_Credits = $Combined_Credits;
        $this->External_Ids = $External_Ids;
    }

    public function ActorDiteal(){
        return collect($this->ActorDiteal)->merge([
            'birthday' => Carbon::parse($this->ActorDiteal['birthday'])->format('M d, Y'),
            'age' => Carbon::parse($this->ActorDiteal['birthday'])->age,
            'profile_path' => $this->ActorDiteal['profile_path']
                ? 'https://image.tmdb.org/t/p/w500/' . $this->ActorDiteal['profile_path']
                : 'https://via.placeholder.com/300x450',
        ]);
    }

    public function External_Ids(){
        return collect($this->External_Ids)->merge([
            'instagram_id' => $this->External_Ids['instagram_id'] ? 'https://instagram.com/'.$this->External_Ids['instagram_id'] : null,
            'facebook_id' => $this->External_Ids['facebook_id'] ? 'https://facebook.com/'.$this->External_Ids['facebook_id'] : null,
            'twitter_id' => $this->External_Ids['twitter_id'] ? 'https://twitter.com/'.$this->External_Ids['twitter_id'] : null
        ]);
        
    }

    public function Combined_movie(){

        $castMovie = collect($this->Combined_Credits)->get('cast');
        return collect($castMovie)->where('media_type', 'movie')->sortByDesc('popularity')->take(5)
            ->map(function ($movie) {
                return collect($movie)->merge([
                    'poster_path' => $movie['poster_path']
                        ? 'https://image.tmdb.org/t/p/w185' . $movie['poster_path']
                        : 'https://via.placeholder.com/185x278',
                    'title' => isset($movie['title']) ? $movie['title'] : 'Untitled',
                ]);
            });
        
    }


    public function Combined_credits(){
        $castMovie = collect($this->Combined_Credits)->get('cast');
    
        return collect($castMovie)->map(function($movie){
            if(isset($movie['release_date'])){
                $releaseData = $movie['release_date'];
            }elseif(isset($movie['first_air_date'])){
                // Fix typo in 'first_air_date'
                $releaseData = $movie['first_air_date']; 
            }else{
                $releaseData = '';
            }
    
            if(isset($movie['title'])){
                $title = $movie['title'];
            }elseif(isset($movie['name'])){
                $title = $movie['name'];
            }else{
                $title = ''; 
            }
           
            return collect($movie)->merge([
                'release_date' => $releaseData,
                'title' => $title,
                'release_year' => isset($releaseData) ? Carbon::parse($releaseData)->format('Y') : 'Future',
                'character' => isset($movie['character']) ? $movie['character'] : '',
            ]);
          
        })->sortByDesc('release_date');
    }
    

}
