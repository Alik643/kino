<?php

namespace App\Http\Controllers\Admin\Film;

use App\Http\Requests\Admin\Film\UpdateRequest;
use App\Models\Film;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request,Film $film)
    {
        $data = $request->validated();
        $this->service->update($data, $film);
        return view('admin.films.show', compact('film'));
    }
}
