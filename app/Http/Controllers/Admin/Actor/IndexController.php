<?php

namespace App\Http\Controllers\Admin\Actor;

use App\Http\Controllers\Controller;
use App\Models\Actor;

class IndexController extends Controller
{
    public function __invoke()
    {
        $actors=Actor::all()->sortBy('actor');
        return view('admin.actor.index', compact('actors'));
    }
}
