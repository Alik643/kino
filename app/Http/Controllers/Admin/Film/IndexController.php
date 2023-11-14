<?php

namespace App\Http\Controllers\Admin\Film;

use App\Http\Controllers\Controller;
use App\Models\Film;
use Illuminate\Http\Request;

class IndexController extends BaseController
{
    public function __invoke()
    {
        $films=Film::all()->sortBy('name');
        return view('admin.film.index', compact('films'));
    }
}
