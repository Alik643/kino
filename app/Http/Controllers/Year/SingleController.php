<?php


namespace App\Http\Controllers\Year;



use App\Http\Controllers\Controller;
use App\Models\Year;

class SingleController extends Controller
{
    public function __invoke(Year $year)
    {
        return view('year.single', compact('year'));
    }
}
