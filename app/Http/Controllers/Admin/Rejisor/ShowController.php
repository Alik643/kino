<?php

namespace App\Http\Controllers\Admin\Rejisor;

use App\Http\Controllers\Controller;
use App\Models\Rejisor;

class ShowController extends Controller
{
    public function __invoke(Rejisor $rejisor)
    {

        return view('admin.rejisor.show', compact('rejisor'));
    }
}
