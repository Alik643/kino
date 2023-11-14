<?php

namespace App\Http\Controllers\Admin\Rejisor;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Rejisor\UpdateRequest;
use App\Models\Rejisor;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request,Rejisor $rejisor)
    {
        $data=$request->validated();
        if(isset($data['image'])) {
            $data['image'] = Storage::disk('public')->put('/images', $data['image']);
        }
        $rejisor->update($data);
        return view('admin.rejisor.show', compact('rejisor'));
    }
}
