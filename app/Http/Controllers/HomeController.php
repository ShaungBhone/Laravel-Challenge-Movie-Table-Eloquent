<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $movies = Movie::get()->sortByDesc(function($movie) {
            return $movie->ratings->avg('rating');
        })->take(100);

        return view('home', compact('movies'));
    }
}
