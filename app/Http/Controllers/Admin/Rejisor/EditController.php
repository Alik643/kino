<?php

namespace App\Http\Controllers\Admin\Rejisor;

use App\Http\Controllers\Controller;
use App\Models\Rejisor;

class EditController extends Controller
{
    public function __invoke(Rejisor $rejisor)
    {
        return view('admin.rejisor.edit', compact('rejisor'));
    }
}
