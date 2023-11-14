<?php


namespace App\Http\Controllers\Actor;



use App\Http\Controllers\Controller;
use App\Models\Actor;

class SingleController extends Controller
{
    public function __invoke(Actor $actor)
    {
        return view('actor.single', compact('actor'));
    }
}
