<?php

namespace App\Http\Controllers\Admin\Actor;

use App\Http\Controllers\Controller;
use App\Models\Actor;

class DeleteController extends Controller
{
    public function __invoke(Actor $actor)
    {
        $actor->delete();
        return redirect()->route('admin.actor.index');
    }
}
