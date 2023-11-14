<?php

namespace App\Http\Controllers\Admin\Genre;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Genre\StoreRequest;
use App\Models\genre;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data=$request->validated();
        genre::firstOrCreate($data);
        return redirect()->route('admin.genre.index');
    }
}
