<?php

namespace App\Http\Controllers\Admin\Film;

use App\Http\Controllers\Controller;
use App\Service\FilmService;

class BaseController extends Controller
{
    public $service;

    public function __construct(FilmService $service)
    {
        $this->service = $service;
    }
}
