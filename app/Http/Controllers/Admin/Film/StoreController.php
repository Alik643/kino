<?php

namespace App\Http\Controllers\Admin\Film;

use App\Http\Requests\Admin\Film\StoreRequest;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $this->service->store($data);
        return redirect()->route('admin.film.index');
    }
}
