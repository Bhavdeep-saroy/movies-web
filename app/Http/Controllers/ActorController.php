<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http; 
use App\ViewModels\ActorViewModel;
use App\ViewModels\ActorDetailViewModel;

class ActorController extends Controller
{

   

   public function actor()
   {
      
    $popularActor = Http::withToken(config('services.tmdb.token'))
    ->get('https://api.themoviedb.org/3/person/popular')
    ->json()['results'];

    $viewmodel = new ActorViewModel($popularActor,);

      return view('actor',$viewmodel);
    
   }

   public function ActorDiteal($id){

      $ActorDiteal = Http::withToken(config('services.tmdb.token'))
      ->get('https://api.themoviedb.org/3/person/'.$id)
      ->json();

      $External_Ids = Http::withToken(config('services.tmdb.token'))
      ->get("https://api.themoviedb.org/3/person/{$id}/external_ids")
      ->json();
  
  $Combined_Credits = Http::withToken(config('services.tmdb.token'))
      ->get("https://api.themoviedb.org/3/person/{$id}/combined_credits")
      ->json();
  

      $ActorDetailViewModel = new ActorDetailViewModel($ActorDiteal, $Combined_Credits, $External_Ids);

      return view('actorDetail',$ActorDetailViewModel);
   }
   
   
}
