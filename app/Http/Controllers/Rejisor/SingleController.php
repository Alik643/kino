<?php


namespace App\Http\Controllers\Rejisor;



use App\Http\Controllers\Controller;
use App\Models\Rejisor;

class SingleController extends Controller
{
    public function __invoke(Rejisor $rejisor)
    {
        return view('rejisor.single', compact('rejisor'));
    }
}
