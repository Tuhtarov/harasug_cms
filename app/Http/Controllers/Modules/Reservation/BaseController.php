<?php

namespace App\Http\Controllers\Modules\Reservation;

use App\Contracts\Index\IHome;
use App\Http\Controllers\Controller;

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
