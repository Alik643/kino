<?php

namespace App\Http\Controllers\Films\Comment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Film\Comment\StoreRequest;
use App\Models\Comment;
use App\Models\Film;

class StoreController extends Controller
{
    public function __invoke(Film $film, StoreRequest $request)
    {
        $data=$request->validated();
        $data['user_id']=auth()->user()->id;
        $data['film_id']=$film->id;
        Comment::create($data);
        return redirect()->route('films.show', $film->id);
    }
}
