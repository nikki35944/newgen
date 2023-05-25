<?php

namespace App\Http\Controllers;

use App\Service\Artist\Service;

class BaseController extends Controller
{
    public $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }
}
