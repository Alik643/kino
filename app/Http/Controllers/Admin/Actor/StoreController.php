<?php

namespace App\Http\Controllers\Admin\Actor;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Actor\StoreRequest;
use App\Models\Actor;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data=$request->validated();
        $data['image'] = Storage::disk('public')->put('/images', $data['image']);
        Actor::firstOrCreate($data);
        return redirect()->route('admin.actor.index');
    }
}
