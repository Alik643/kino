<?php


namespace App\Http\Controllers\Films;



use App\Http\Controllers\Controller;
use App\Models\Film;

class ShowController extends Controller
{
    public function __invoke(Film $film)
    {
        $avg=$film->rates->avg('rate');
        $avg=round($avg, 1);
        return view('films.show', compact('film', 'avg'));
    }
}
