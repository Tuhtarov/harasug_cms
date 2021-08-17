<?php

namespace App\Http\Controllers\Modules\About;

use App\Contracts\Index\IAbout;
use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    protected IAbout $service;

    /**
     * BaseController constructor.
     * @param IAbout $service
     */
    public function __construct(IAbout $service)
    {
        $this->service = $service;
    }
}
