<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http; // Add this line

class Searchdropdown extends Component
{
    public $search = '';
    public function render()
    {
        $searchresult = [];

        if(strlen($this->search) > 2){
            $searchresult = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/search/movie?query='.$this->search)
            ->json()['results'];
        }


        return view('livewire.searchdropdown',[
           'searchresult' => collect($searchresult)->take(7),
        ]);
    }
}
