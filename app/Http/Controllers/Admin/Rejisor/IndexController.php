<?php

namespace App\Http\Controllers\Admin\Rejisor;

use App\Http\Controllers\Controller;
use App\Models\Rejisor;

class IndexController extends Controller
{
    public function __invoke()
    {
        $rejisors=Rejisor::all()->sortBy('name');
        return view('admin.rejisor.index', compact('rejisors'));
    }
}
