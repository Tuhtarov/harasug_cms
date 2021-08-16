<?php

namespace App\Http\Controllers\Modules\Gallery;

use App\Contracts\Gallery\IGallery;
use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    protected IGallery $service;

    /**
     * BaseController constructor.
     * @param IGallery $service
     */
    public function __construct(IGallery $service)
    {
        $this->service = $service;
    }
}
