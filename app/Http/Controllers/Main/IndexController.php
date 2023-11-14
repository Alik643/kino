<?php


namespace App\Http\Controllers\Main;


use App\Http\Controllers\Controller;
use App\Models\Film;

class IndexController extends Controller
{
    public function __invoke()
    {
        $likedfilms=Film::withCount('likedUsers')->orderBy('liked_users_count', 'DESC')->get()->take(5);
        return view('main.index', compact('likedfilms'));
    }
}
