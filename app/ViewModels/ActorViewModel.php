<?php

namespace App\ViewModels;
use App\Http\Controllers\ActorController;

use Spatie\ViewModels\ViewModel;

class ActorViewModel extends ViewModel
{
    public $popularActor;
 

    public function __construct($popularActor,)
    {
        $this->popularActor = $popularActor;
       
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
   
}
