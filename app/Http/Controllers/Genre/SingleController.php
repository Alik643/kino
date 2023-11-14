<?php


namespace App\Http\Controllers\Genre;



use App\Http\Controllers\Controller;
use App\Models\Genre;

class SingleController extends Controller
{
    public function __invoke(Genre $genre)
    {
        return view('genre.single', compact('genre'));
    }
}
