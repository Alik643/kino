<?php

namespace App\Http\Controllers\Admin\Film;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use App\Models\Rejisor;
use App\Models\Film;
use App\Models\Actor;
use App\Models\Year;
use Illuminate\Http\Request;

class EditController extends BaseController
{
    public function __invoke(Film $film)
    {
        $rejisors=Rejisor::all();
        $years=Year::all();
        $actors=Actor::all();
        $genres=Genre::all();
        return view('admin.film.edit', compact('film', 'rejisors', 'actors', 'years', 'genres'));
    }
}
