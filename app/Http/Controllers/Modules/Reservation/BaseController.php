<?php

namespace App\Http\Controllers\Modules\Reservation;

use App\Contracts\Index\IHome;
use App\Contracts\Reservation\ReservationBase;
use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    protected IHome $homeService;
    protected ReservationBase $mainService;

    /**
     * BaseController constructor.
     * @param IHome $homeService
     * @param ReservationBase $mainService
     */
    public function __construct(IHome $homeService, ReservationBase $mainService)
    {
        $this->homeService = $homeService;
        $this->mainService = $mainService;
    }

}
