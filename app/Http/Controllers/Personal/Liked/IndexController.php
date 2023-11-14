<?php

namespace App\Http\Controllers\Personal\Liked;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke()
    {
        $films= auth()->user()->likedFilms;
        return view('personal.liked.index', compact('films'));
    }
}
