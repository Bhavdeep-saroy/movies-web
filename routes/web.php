<?php

use App\Http\Controllers\MoviesController;
use App\Http\Controllers\ActorController;
use App\Http\Controllers\TvController;
use App\Http\Controllers\Transfer_MTA;



Route::get('/', [Transfer_MTA::class, 'index'])->name('index');
Route::get('/movies/{movie}', [MoviesController::class,'playmovies'])->name('movies.play');
Route::get('/movie', [MoviesController::class, 'movie'])->name('movie');

Route::get('/actor', [ActorController::class, 'actor'])->name('actor');
Route::get('/ActorId/{id}', [ActorController::class,'ActorDiteal'])->name('ActorId');

Route::get('/TvShow', [TvController::class, 'TvShow'])->name('TvShow');
Route::get('/playTvShow/{id}',[TvController::class, 'playTvShow'])->name('playTvShow');
