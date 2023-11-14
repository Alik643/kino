<?php

namespace App\Http\Controllers\Admin\Rejisor;

use App\Http\Controllers\Controller;
use App\Models\Rejisor;

class DeleteController extends Controller
{
    public function __invoke(Rejisor $rejisor)
    {
        $rejisor->delete();
        return redirect()->route('admin.rejisor.index');
    }
}
