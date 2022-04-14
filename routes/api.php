<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MoviesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*
    Endpoints for clients to access movies data
    They can access all movies from the database.
    They can access a particular movie data from the database if they know the title or name of the movie.
    They can also access range of movies base on the month or year the movie was created or released.
*/

Route::controller(MoviesController::class)->group(function() {

    Route::get('/movies', 'getAllMovies');

    Route::get('/movie/{name}', 'getMovieByName');

    Route::get('/movies/{year}', 'filterMoviesByYearCreated');
});
