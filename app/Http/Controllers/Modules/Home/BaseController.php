<?php

namespace App\Http\Controllers\Modules\Home;

use App\Contracts\Index\IHome;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    protected IHome $service;

    /**
     * BaseController constructor.
     * @param IHome $service
     */
    public function __construct(IHome $service)
    {
        $this->service = $service;
    }
}
