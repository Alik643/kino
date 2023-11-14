<?php

namespace App\Http\Controllers\Admin\Actor;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Actor\UpdateRequest;
use App\Models\Actor;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request,Actor $actor)
    {
        $data=$request->validated();
        if(isset($data['image'])) {
            $data['image'] = Storage::disk('public')->put('/images', $data['image']);
        }
        $actor->update($data);
        return view('admin.actor.show', compact('actor'));
    }
}
