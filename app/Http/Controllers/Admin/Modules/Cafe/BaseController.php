<?php

namespace App\Http\Controllers\Admin\Modules\Cafe;

use App\Contracts\Cafe\ICafe;
use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    protected ICafe $service;

    /**
     * BaseController constructor.
     * @param ICafe $service
     */
    public function __construct(ICafe $service)
    {
        $this->service = $service;
    }
}
