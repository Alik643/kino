<?php


namespace App\Http\Controllers\Films\Like;


use App\Http\Controllers\Controller;
use App\Models\Film;

class StoreController extends Controller
{
    public function __invoke(Film $film)
    {
        auth()->user()->likedFilms()->toggle($film->id);
        return back();
    }

}
