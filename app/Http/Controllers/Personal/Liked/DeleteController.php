<?php

namespace App\Http\Controllers\Personal\Liked;

use App\Http\Controllers\Controller;
use App\Models\Film;

class DeleteController extends Controller
{
    public function __invoke(Film $film)
    {
        auth()->user()->likedFilms()->detach($film->id);
        return redirect()->route('personal.liked.index');
    }
}
