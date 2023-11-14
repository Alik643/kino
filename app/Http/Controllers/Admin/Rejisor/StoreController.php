<?php

namespace App\Http\Controllers\Admin\Rejisor;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Rejisor\StoreRequest;
use App\Models\Rejisor;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data=$request->validated();
        $data['image'] = Storage::disk('public')->put('/images', $data['image']);
        Rejisor::firstOrCreate($data);
        return redirect()->route('admin.rejisor.index');
    }
}
