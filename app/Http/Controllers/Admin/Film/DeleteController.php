<?php

namespace App\Http\Controllers\Admin\Film;

use App\Http\Controllers\Controller;
use App\Models\Film;

class DeleteController extends BaseController
{
    public function __invoke(Film $film)
    {
        $film->delete();
        return redirect()->route('admin.film.index');
    }
}
