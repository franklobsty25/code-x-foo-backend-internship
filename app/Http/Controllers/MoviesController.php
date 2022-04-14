<?php

namespace App\Http\Controllers;

use App\Models\Movies;

class MoviesController extends Controller
{
    // Fetching all movies data
    public function getAllMovies()
    {
        $movies = Movies::all();

        return response()->json(['data' => $movies]);
    }

    // Search for a movie by name
    public function getMovieByName($name)
    {

        $movie = Movies::where('name', $name)->first();

        return response()->json(['data' => $movie]);
    }

    // Filtering movies data by month, year created and sort ascending order
    public function filterMoviesByYearCreated($monthOrYear)
    {
        $movies = Movies::whereMonth('created_at', $monthOrYear)
                        ->orWhereYear('created_at', $monthOrYear)
                        ->orderBy('media_type', 'asc')
                        ->get();

        return response()->json(['data' => $movies]);
    }
}
