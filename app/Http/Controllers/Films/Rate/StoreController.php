<?php

namespace App\Http\Controllers\Films\Rate;

use App\Http\Controllers\Controller;
use App\Http\Requests\Film\Rate\StoreRequest;
use App\Models\Rate;
use App\Models\Film;

class StoreController extends Controller
{
    public function __invoke(Film $film, StoreRequest $request)
    {
        $data=$request->validated();
        $data['user_id']=auth()->user()->id;
        $data['film_id']=$film->id;
        Rate::firstOrCreate([
            'user_id' => $data['user_id'],
            'film_id'=>$data['film_id']
        ], $data);
        return back();
    }
}
