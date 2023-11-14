<?php


namespace App\Http\Controllers\Admin\Main;


use App\Http\Controllers\Controller;
use App\Models\Actor;
use App\Models\Film;
use App\Models\Genre;
use App\Models\Rejisor;
use App\Models\User;
use App\Models\Year;

class IndexController extends Controller
{
    public function __invoke()
    {
        $data=[];
        $data['filmsCount']=Film::all()->count();
        $data['rejisorsCount']=Rejisor::all()->count();
        $data['actorsCount']=Actor::all()->count();
        $data['genresCount']=Genre::all()->count();
        $data['usersCount']=User::all()->count();
        return view('admin.main.index', compact('data'));
    }
}
